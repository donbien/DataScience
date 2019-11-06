<?php
  
namespace App\Http\Controllers;
  
use App\Timetable;
use Illuminate\Http\Request;
  use App\StudentResults;
  use App\Students;
  use App\User;
  use App\Notifications\SignupActivate;


class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

foreach($result as $studentresult)
        {


          $data=$studentresult->student['email_address'];

$user = User::where('email', $studentresult->student['email_address'])->first();
//      $user = new User();
// $user->email = 'gmuchiri@strathmore.edu';   // This is the email you want to send to.


$user->notify(new SignupActivate($save));
// 

       

   }


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