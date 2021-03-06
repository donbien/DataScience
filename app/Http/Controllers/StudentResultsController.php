<?php
namespace App\Http\Controllers;
use App\StudentResults;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\User;
use Auth;
class StudentResultsController extends Controller
{
 //Updating the value of status and class in table student_unit to determine what is to be displayed to the student.
    public function updateColumns()
    {
        $query = DB::table('student_units')->get('marks');
        $marks = StudentResults::get();
        $marks->map(function ($item) use ($query)
        {
            if ($mark = $item->marks)
            {
                if ($mark >= (float)40)
                {
                    StudentResults::where('marks', $mark)->update(['status' => 'pass']);
                }
                elseif ($mark <= (float)39 && $mark >= (float)36)
                {
                    StudentResults::where('marks', $mark)->update(['status' => 'fail', 'class' => 'Retake']);
                }
                else
                {
                    StudentResults::where('marks', $mark)->update(['status' => 'fail', 'class' => 'Repeat']);
                }
            }
            else
            {
                StudentResults::where('marks', $mark)->update(['status' => 'Special','class' => 'Special' ]);
            }
        });
    }
    public function FailedUnits()
    {
        // $this->updateColumns();
 $student = User::where('role_id','=',5)->first();
           if(Auth::user() == $student) {

            $adm=Auth::user()->adm_no;
 $failed = StudentResults::where('marks', '<', 40)->where('student_number','=',$adm)->join('timetables','student_results.unit_code','=', 'timetables.unit_code')->get();
        return response()->json($failed);

     }
       
else{

   $failed = StudentResults::where('marks', '<', 40)->get();
        return response()->json($failed);  
}

    }


    public function Retakes()
    {
       $retake = StudentResults::where('marks', '<=', 35)->get();
        return response()->json(   $retake);
    }


    public function Repeat()
    {
            $repeats = StudentResults::where(function ($q) {
            $q->where('marks', '<=', 39);
            $q->where('marks', '>=', 36);
            })->get();
            return response()->json($repeats);
    }

   public function Reports()
    {
   $reports = StudentResults::where('marks', '<', 40)->select('unit_code',
            DB::raw('count(id) as Total')
     
  )->groupBy('unit_code')->orderBy('unit_code', 'ASC')->get();

      return response()->json($reports);
    }

    public function Specials()
    {
    $special=StudentResults::where('marks', '=', NULL)->get();
        return response()->json($special);
    }




}