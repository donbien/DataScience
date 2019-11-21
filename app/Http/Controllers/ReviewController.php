<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reviews;
  use App\User;
use App\Application;
use Auth;
use App\Notifications\DeanNotification;
use App\Notifications\RegistrarNotification;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //Enter Vaalidation rules
      $rules = [
          
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator, 422);
        } else {
            $review = new Reviews;
            $review->application_id = $request->input('id');
            $review->staff_id = Auth::user()->id;
            $review->comment = $request->input('comment');

            try {

        $dean = User::where('role_id','=',4)->first();
        $registrar = User::where('role_id','=',7)->first();

                if (Auth::user() == $dean ) {
               $user = User::where('role_id','=',7)->first();
               $user->notify(new RegistrarNotification($review));

              $application = Application::findOrFail($request->input('id'));
               $application->status = 'Approved by Dean';

                $application->save();
                $review->save();
                }

               else if (Auth::user() ==   $registrar) {
           

              $application = Application::findOrFail($request->input('id'));
               $application->status = 'Approved by Academic Registrar';

                $application->save();
                $review->save();
                }

            else{

               $user = User::where('role_id','=',4)->first();
               $user->notify(new DeanNotification($review));
               $application = Application::findOrFail($request->input('id'));
               $application->status = 'Approved by Course Admin';

                $application->save();
                $review->save();


            }  


                return response()->json($review);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = StudentResults::findOrFail($id);

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  request
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = StudentResults::findOrFail($id);

            $item->delete();

            return response()->json($item, 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
