<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Charts;
use App\StudentResults;
use DB;

class ChartController extends Controller
{
    public function index()
    {



    $users = StudentResults::where('marks', '<=', 35)->select('unit_code',
            DB::raw('count(id) as Total')
     
  )->groupBy('unit_code')->orderBy('unit_code', 'ASC')->get();

 $chart = Charts::database($users, 'bar', 'highcharts')
                  ->title("Retakes")
                  ->elementLabel("No of Students")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('unit_code');
        return view('chart',compact('chart'));
    }
 public function repeat()
    {



    $users = StudentResults::  where(function ($q) {
  $q->where('marks', '<=', 39);
  $q->where('marks', '>=', 36);
})->select('unit_code',
            DB::raw('count(id) as Total')
     
  )->groupBy('unit_code')->orderBy('unit_code', 'ASC')->get();

$repeat = Charts::database($users, 'bar', 'highcharts')
                  ->title("Repeats")
                  ->elementLabel("No of Students")
                  ->dimensions(1000, 500)
                  ->responsive(false)
                  ->groupBy('unit_code');
        return view('repeat',compact('repeat'));
    }






}