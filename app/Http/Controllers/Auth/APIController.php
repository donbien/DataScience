<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\SignupActivate;
use Illuminate\Support\Facades\Auth;

use App\Models\Notifications;
use App\Models\Profile;
use App\User;
use Carbon\Carbon;
use Validator;
use Redirect;
use Response;

class APIController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'activation_token' => str_random(60)
        ]);

        $profile = Profile::create([
            'user_id'   => $user->id,
            'fname'     => request('fname'),
            'lname'     => request('lname'),
            'phone_number'   => request('pnumber'),
            'role_id' =>  1
        ]);

        $user->notify(new SignupActivate($user));

        return response()->json([
            'message' => 'Account created',
            'user' => $user,
            'status' => 200,
        ]);
    }

    public function login()
    {
        // Check if a user with the specified email exists
        $user = User::whereEmail(request('email'))->first();

        if (! $user) {

            //flash('Wrong email or password')->error();
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422,
            ], 422);
        }
        /*
         If a user with the email was found - check if the specified password
         belongs to this user
        */
        if (! \Hash::check(request('password'), $user->password)) {
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422,
            ], 422);
        }


        // Format the final response in a desirable format
        return response()->json([
            'user' => $user,
            'status' => 200,
        ]);
    }
    
    public function adminlogin()
    {
        // Check if a user with the specified email exists
        $user = User::whereEmail(request('username'))->first();

        if (! $user) {

            //flash('Wrong email or password')->error();
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422,
            ], 422);
        }
        /*
         If a user with the email was found - check if the specified password
         belongs to this user
        */
        if (! \Hash::check(request('password'), $user->password)) {
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422,
            ], 422);
        }

        if ($user->active != 1) {
            return response()->json([
                'message' => 'Please activate your account',
                'status' => 422,
            ], 422);
        }



         if ($user->role_id != 5) {
            return response()->json([
                'message' => 'You are not an admin',
                'status' => 422,
            ], 422);
        }


         
        $secret = \DB::table('oauth_clients')
            ->where('id', env('PASSWORD_CLIENT_ID'))
            ->first()->secret;

        // Send an internal API request to get an access token
        $data = [
            'grant_type' => 'password',
            'client_id' => env('PASSWORD_CLIENT_ID'),
            'client_secret' => $secret,
            'username' => request('username'),
            'password' => request('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);

        $response = app()->handle($request);

        if ($response->getStatusCode() != 200) {
            return response()->json([
                'message' => 'Wrong email or password',
                'status' => 422,
            ], 422);
        }

        // Get the data from the response
        $data = json_decode($response->getContent());

        // Format the final response in a desirable format
        return response()->json([
            'token' => $data->access_token,
            'user' => $user,
            'status' => 200,
        ]);
    }
    
    
    

    public function logout()
    {
        $accessToken = auth()->user()->token();

        $refreshToken = \DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true,
            ]);

        $accessToken->revoke();

        return response()->json(['status' => 200]);
    }

    public function getUser()
    {
        return auth()->user();
    }

    public function getUserModel()
    {
        $user = User::whereId(auth()->user()->id)->with('profile')->first();
        return response()->json($user);
    }

    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->role_id=5;
        $user->save();
          return Redirect::to('http://admin.agilishisa.co.ke');
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }

    public function notificationRead($id)
    {
        $notification = Notifications::whereId($id)->first();
        $notification->read_at = Carbon::now();
        $notification->save();

        return response()->json(200);
    }
}