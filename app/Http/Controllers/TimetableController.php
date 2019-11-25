<?php

namespace App\Http\Controllers;

use App\Timetable;
use Illuminate\Http\Request;
use App\StudentResults;
use App\Students;
use App\User;
use App\Notifications\SignupActivate;
use Auth;
use Session;
use Excel;
use File;
use DB;
class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function extract(Request $request)
    {
        // TODO Count a timetable as one for rows extracted.
        $class = collect(array_map('str_getcsv', File($request->file)));
        $class = $class->slice(3, 15);

        $days = $class->nth(3);
        $units = $class->slice(1)->nth(3);
        $lecturers = $class->slice(2)->nth(3);

        foreach ($days as $key => $day) {
            foreach ($day as $time => $code) {
                if ($time < 1) continue; // Skip First Slot as it contains the day not a unit
                if ($code) {

                 $timetable = Timetable::create($request->toArray() + [
                    'unit_name' => $units[$key][$time],
                    'unit_code' => $code,
                    'day_of_the_week' => $day[0],
                    'time' => $time,
                    'lecturer' => $lecturers[$key][$time],
                ]);



             }


         }


     }

//        $unit_code = Timetable::get(['unit_code']);


// $result=StudentResults::with('student')->where('unit_code', '=', "$unit_code")->where(function($query) {
//             $query->where('marks', '<=', '40');
//         })->get();



    $special = StudentResults::with('student')->join('timetables','student_results.unit_code','=', 'timetables.unit_code')->where('student_results.marks', '<', 40)->get();

      return response()->json( $special );

 }


public function details($unit_code){


   $details = StudentResults::with('student')->where('student_results.unit_code','=' ,$unit_code)->join('timetables','student_results.unit_code','=', 'timetables.unit_code')->where('student_results.marks', '<', 40)->get();
   $details=$details->unique('day_of_the_week');
   $details=$details->groupBy('unit_code');

      return response()->json( $details );



}

 public function import(Request $request){
        //validate the xls file
    $this->validate($request, array(
        'file'      => 'required'
    ));

    if($request->hasFile('file')){
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

            $path = $request->file->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
        // $class = collect(array_map('str_getcsv', File($request->file)));
            dd($data);
            $class = $class->slice(3, 15);
            $days = $class->nth(3);
            $units = $class->slice(1)->nth(3);
            $lecturers = $class->slice(2)->nth(3);
            dd($class);
            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {
                    $insert[] = [
                        'unit_name' => $value->unit_name,
                        'unit_code' => $value->unit_code,
                        'day_of_the_week' => $value->day_of_the_week,
                        'time' => $value->time, 
                        'lecturer' => $value->lecturer, 
                    ];
                }

                if(!empty($insert)){

                    $insertData = DB::table('timetables')->insert($insert);
                    if ($insertData) {
                       return response()->json($insertData);
                   }else {                        
                      return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
                      return back();
                  }



              }
          }

          return back();

      }else {
        Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
        return back();
    }
}
}



public function index()
{
    $Timetables = Timetable::latest()->paginate(5);

    return view('timetable.index',compact('Timetables'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timetable.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $save=Timetable::create($request->all());


        $result=StudentResults::with('student')->where('unit_code', 'LIKE', "%{$request->input('unit_code')}%")->where(function($query) {
            $query->where('marks', '<=', '40');
        })->get();
//         foreach($result as $studentresult)
//         {
//           $data=$studentresult->student['email_address'];
//           $user = User::where('email', $studentresult->student['email_address'])->first();
// //      $user = new User();
// // $user->email = 'gmuchiri@strathmore.edu';   // This is the email you want to send to.
//           $user->notify(new SignupActivate($save));
// // 

//       }
      return response()->json($save);
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Timetable  $Timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $Timetable)
    {
        return view('timetable.show',compact('Timetable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Timetable  $Timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $Timetable)
    {
        return view('timetable.edit',compact('Timetable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Timetable  $Timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $Timetable)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $Timetable->update($request->all());

        return redirect()->route('timetable.index')
        ->with('success','Timetable updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Timetable  $Timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $Timetable)
    {
        $Timetable->delete();

        return redirect()->route('timetable.index')
        ->with('success','Timetable deleted successfully');
    }
}