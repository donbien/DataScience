<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
  use App\StudentResults;
  use App\Student;
  use App\User;
  use App\Exams;
  use Storage;
  use phpDocumentor\Reflection\DocBlock\Tags\Example;
use Smalot\PdfParser\Parser;
use Symfony\Component\HttpFoundation\Response;

class ExamController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Exams $model)
    {
        return view('exams.index', ['exams' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('exams.create');
    }

        public function extract(Request $request)
    {
        $path = $request->file('file')->store('exams');
        $PDFParser = new Parser();
    try
    {
        $pdf = $PDFParser->parseFile(storage_path('app/' . $path));
        $pages  = $pdf->getPages();
        foreach ($pages as $page)
        {
            $required =$page->getText();

            dd( strpos(strtolower($required), strtolower('BCM 1103')));
         
             if(strpos(strtolower($required), strtolower('BCM 1103'))){
                    return "🥳 Yahooo... I found ".substr_count(strtolower(    $required),strtolower('BCM 1103')).' <i>"'.'BCM 1103'.'"</i>';
                }else if(strtolower('BCM 1103') == "BCM 1103" || strtolower('BCM 1103') == "BCM 1103"){
                    return "<b>😍 Love you ... ♥♥♥</b>";
                }
                else{
                    return "😑 Hufft... I can't find your ".'<i>"'.'BCM 1103'.'"</i>';
                }




        }

                  
               


    }
    catch (Exception $exception)
    {
        return $exception;
    }
     return "$page". "=>" ."$page->getText()" ."\n";
    
}
    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
     public function store(Request $request)
    {
    

     
    Exams::create($request->all());
        return redirect()->route('exams.index')
                        ->with('success','Timetable created successfully.');
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
  
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
