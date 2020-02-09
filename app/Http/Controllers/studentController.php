<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Students_log;
use App\Class_table;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::get();
        return view('Student.studentList',compact(['student']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $cls = Class_table::where('id',$student->class)->first();
        return view('Student.show',compact(['student','cls']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $cls = Class_table::get();
        return view('Student.editStudent',compact(['student','cls']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = auth()->user()->id;

        $student = Student::find($id);
        $name="";

        $student->name = $request->input('name');
        $student->father = $request->input('father');
        $student->mother = $request->input('mother');

        if($student->class != $request->input('class')){

            $student->class = $request->input('class');
            $data_to_store_at_student_log_table = array(
                "act_type" => "Class Promotion","act_typ_auto_id" => $student->id,"created_by" => $user_id,
            );
            Students_log::create($data_to_store_at_student_log_table);
        }
        $student->gender = $request->input('gender');
        $student->contactNo = $request->input('contactNo');
        $student->birthDate = $request->input('birthDate');
        $student->mailingAddress = $request->input('mailingAddress');
        $student->permanentAddress = $request->input('permanentAddress');
        $student->localGurdianName = $request->input('localGurdianName');
        $student->localGuardianContactNo = $request->input('localGuardianContactNo');
        $student->publish = $request->input('publish');
        $student->updated_by = $user_id;
        if($file = $request->file('photo')){
            $album = $student->photo;
            $filename = public_path() . '/image/Current_Students/' . $album;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('image/Current_Students'), $name);
            $student->photo = $name;
        }

        $student->save();
        // return redirect('/admission/'.$id)->with('success','Form Updated');
        return redirect(route('student.edit',$id))->with('success','Form Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $album = $student->photo;
        $filename = public_path() . '/image/Current_Students/' . $album;
        \File::delete($filename);

        $student->delete();
        return redirect('/admission');
    }
}
