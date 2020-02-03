<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Teacher_info_two;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachersTableData = Teacher::get();
        return view('Teacher.list')->with('teachersTableData',$teachersTableData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Teacher.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required', "father" => 'required', "mother" => 'required', "gender" => 'required', "contactNo" => 'required', "birthDate" => 'required', "mailingAddress" => 'required', "permanentAddress" => 'required',

        ]);


        $user_id = auth()->user()->id;
        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('image/Teacher'), $name);}

        $data = array(
            "name" => $request->input('name'),
            "father" => $request->input('father'),
            "mother" => $request->input('mother'),
            "gender" => $request->input('gender'),
            "contactNo" => $request->input('contactNo'),
            "birthDate" => $request->input('birthDate'),
            "mailingAddress" => $request->input('mailingAddress'),
            "permanentAddress" => $request->input('permanentAddress'),
            "created_by" => $user_id,
            "publish" => $request->input('publish'),
            // "photo" => $request->file('photo')->storeAs('public/image',$fileNameToStore),
            "photo" => $name,
        );

        $getId = Teacher::create($data);

        $education_number = $request->input('board');
        foreach($education_number as $key => $en){
            $a = array(
                "teacher_id" => $getId->id,
                "degree" => $request->input('degree')[$key],
                "passing_year" => $request->input('passing_year')[$key],
                "batch" => $request->input('batch')[$key],
                "department" => $request->input('department')[$key],
                "organization_name" => $request->input('organization_name')[$key],
                "result" => $request->input('result')[$key],
                "board" => $request->input('board')[$key],
                "created_by" => $user_id,
                "publish" => $request->input('publish'),
            );
            Teacher_info_two::create($a);
        }

        return redirect('/teacher')->with('success','Teachers Data submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teachersTableData = Teacher::find($id);
        return view('Teacher.show')->with('teachersTableData',$teachersTableData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachersTableData = Teacher::find($id);
        $teacher_ifon_two_table_data = Teacher_info_two::where('teacher_id',$id)->get();
        return view('Teacher.edit',compact(['teachersTableData','teacher_ifon_two_table_data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user_id = auth()->user()->id;
        $getData = Teacher::find($id);

        if($file = $request->file('photo')){
            $name = "";
            $albm = $getData->photo;
            $filename = public_path() . '/image/Teacher/' . $albm;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('image/Teacher'), $name);
            $getData->photo = $name;

            $teachersTableData = Teacher::where('id',$id)->update([
                "photo" => $name,
            ]);
        }

        $teachersTableData = Teacher::where('id',$id)->update([
            "name" => $request->input('name'),
            "father" => $request->input('father'),
            "mother" => $request->input('mother'),
            "gender" => $request->input('gender'),
            "contactNo" => $request->input('contactNo'),
            "birthDate" => $request->input('birthDate'),
            "mailingAddress" => $request->input('mailingAddress'),
            "permanentAddress" => $request->input('permanentAddress'),
            "updated_by" => $user_id,
            "publish" => $request->input('publish'),
        ]);

        $teacher_ifon_two_table_data = Teacher_info_two::where('teacher_id',$id)->get();
        foreach ($teacher_ifon_two_table_data as $key => $value) {
            $value->degree = $request->input('degree')[$key];
            $value->passing_year = $request->input('passing_year')[$key];
            $value->batch = $request->input('batch')[$key];
            $value->department = $request->input('department')[$key];
            $value->organization_name = $request->input('organization_name')[$key];
            $value->result = $request->input('result')[$key];
            $value->board = $request->input('board')[$key];
            $value->updated_by = $user_id;
            $value->publish = $request->input('publish');

            $value->save();
        }

        return redirect(route('teacher.show',$id))->with('success','Profile information is Updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $getData = Teacher::find($id);
        $albm = $getData->photo;
        $filename = public_path() . '/image/Teacher/' . $albm;

        \File::delete($filename);


        $teachersTableData = Teacher::where('id',$id)->delete();
        $teacher_ifon_two_table_data = Teacher_info_two::where('teacher_id',$id)->delete();




        return redirect(route('teacher.index'))->with('success','Profile is successfully deleted');
    }
}
