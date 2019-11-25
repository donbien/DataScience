<?php

namespace App\Http\Controllers;
  use App\Application;
  use App\StudentResults;
  use DB;
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



 $repeat = StudentResults::where(function ($q) {
  $q->where('marks', '<=', 39);
  $q->where('marks', '>=', 36);
})->count();
 $application_stats = Application::count();
 $retakes = StudentResults::where('marks', '<=', 35)->count();
 $special=StudentResults::where('marks', '=', NULL)->count();


 $re = StudentResults::where('marks', '<=', 35)->get();
 $spec=StudentResults::where('marks', '=', NULL)->get();
    $reports = StudentResults::where('marks', '<', 40)->select('unit_code',
            DB::raw('count(id) as Total')
     
  )->groupBy('unit_code')->orderBy('unit_code', 'ASC')->get();

 return view('dashboard', ['application_stats' => $application_stats, 'repeat'=>$repeat,'retakes'=>$retakes,'special'=>$special,'re'=>$re,'reports'=>$reports]);
    }

  // public function Ret()
  //   {
  //      $re = StudentResults::where('marks', '<=', 35)->get();
  //  return view('dashboard', ['re' => $re]);
  //   }

    

   




}
