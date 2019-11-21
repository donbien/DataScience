<?php

namespace App\Http\Controllers;
  use App\Application;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {


 $application_stats = Application::count();
        
 return view('dashboard', ['application_stats' => $application_stats]);
    }
}
