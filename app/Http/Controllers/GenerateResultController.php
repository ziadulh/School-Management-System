<?php

namespace App\Http\Controllers;

use App\GenerateResult;
use Illuminate\Http\Request;
use App\Student;
use App\Class_table;
use App\Subject;
use App\Result;
use SebastianBergmann\Environment\Console;

class GenerateResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $class_id = $request->get('class');
        // dd($class_id);
        $class = Class_table::get();
        $student_table_data = Student::where('class',$class_id)->get();
        if($class_id == 0){
            $student_table_data = Student::get();
        }
        return view('AllStudentList.all', compact(['student_table_data','class','class_id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array(
            "student_table_id" => 1,
            "subject_id" => $request->input('subject_id'),
            "obtain_marks" => $request->input('obtain_marks'),
            "out_of" => $request->input('out_of'),
            "created_by" => 1,
        );

        Result::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GenerateResult  $generateResult
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $student_table_data = Student::find($id);
        $cls = Class_table::where('id',$student_table_data->class)->first();
        $subject = Subject::where('for_class',$cls->id)->get();
        return view('AllStudentList.createReport',compact(['student_table_data','cls','subject']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GenerateResult  $generateResult
     * @return \Illuminate\Http\Response
     */
    public function edit(GenerateResult $generateResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GenerateResult  $generateResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GenerateResult $generateResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GenerateResult  $generateResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenerateResult $generateResult)
    {
        //
    }


    public function testView()
    {
        $subject = Subject::get();

        return view('AllStudentList.testajex',compact(['subject']));
    }

    public function ajexController($id){
        $subject = Subject::where('for_class',$id)->get();
        return response($subject);
    }
}
