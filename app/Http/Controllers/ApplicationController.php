<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
  use App\StudentResults;
  use App\Student;
  use App\User;
  use App\Application;
  use App\Reviews;
  use Storage;
  use Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Application $model)
    {
        $dean = User::where('role_id','=',4)->first();
        $registrar = User::where('role_id','=',7)->first();

if(Auth::user() == $dean ){


 
      $model = Application::where('status','=','Course admin')->get(); 
       return view('applications.index', ['applications' => $model]);

}
else if (Auth::user() == $registrar) {

       $model = Application::where('status','=','Approved by Dean')->get();
       return view('applications.index', ['applications' => $model]);

}
else{

      return view('applications.index', ['applications' => $model->paginate(15)]);
}


        // return view('applications.index', ['applications' => $model->paginate(15)]);
    }


    public function studentapplication(){


 $studentapplication = Application::whereStudent_number(Auth::user()->adm_no)->first();

  return response()->json($studentapplication);

    }


      public function Dean(Request $request)
  {      
    $courseadmin = Application::where('status','=','Course admin')->get();
        return response()->json($courseadmin);
  }



  //   public function Complete(Request $request)
  // {      
  //   $complete = Application::where('order_status_id','=',2)->count();
  //       return response()->json($complete);
  // }


    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('applications.create');
    }



    public function applicationreview()
    {

  

    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */



public function download($file){
    return response()->download(storage_path('app/documents/'.$file));
 }





     public function store(Request $request)
    {
       


                $extension = $request->file('letter_of_reason')->getClientOriginalExtension();
                $fileName = Auth::user()->adm_no.'.'.$extension;   

         $path = $request->file('letter_of_reason')->storeAs('documents', $fileName);


    Application::create($request->all());
        return redirect()->route('application.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
         public function edit(Application $application)
    {
        return view('applications.edit', compact('application'));
    }


 public function countApplication(Request $request)
    {
       
            $application_stats = Application::count();


 // return view('dashboard', ['application_stats' => $application_stats]);
        return response()->json($application_stats);
    }




 

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password']
        ));

        // return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        // return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
