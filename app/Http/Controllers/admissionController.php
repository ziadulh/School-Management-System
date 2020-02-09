<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Students_log;


use App\Admission;
use App\Class_table;

class admissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissionTableData = Admission::get();

        return view('admission.list')->with('admissionTableData',$admissionTableData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cls = Class_table::get();
        return view('admission.admissionForm')->with('cls',$cls);
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
            "name" => 'required', "father" => 'required', "mother" => 'required', "class" => 'required',"email" => 'required|email', "gender" => 'required', "contactNo" => 'required', "birthDate" => 'required|date', "mailingAddress" => 'required', "permanentAddress" => 'required', "localGurdianName" => 'required', "localGuardianContactNo" => 'required',

        ]);

        // if($request->hasFile('photo')){

        //     $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        //     $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //     $extention = $request->File('photo')->getClientOriginalExtension();

        //     $fileNameToStore = $filename.'_'.time().'.'.$extention;
        // }else{
        //     $fileNameToStore = 'noimage';
        // }


        $user_id = auth()->user()->id;
        $name='';
        if($file = $request->file('photo')){
            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('image/Admission'), $name);}

        $data = array(
            "name" => $request->input('name'),
            "father" => $request->input('father'),
            "mother" => $request->input('mother'),
            "class" => $request->input('class'),
            "email" => $request->input('email'),
            "gender" => $request->input('gender'),
            "contactNo" => $request->input('contactNo'),
            "birthDate" => $request->input('birthDate'),
            "mailingAddress" => $request->input('mailingAddress'),
            "permanentAddress" => $request->input('permanentAddress'),
            "localGurdianName" => $request->input('localGurdianName'),
            "localGuardianContactNo" => $request->input('localGuardianContactNo'),
            "created_by" => $user_id,
            "publish" => $request->input('publish'),
            // "photo" => $request->file('photo')->storeAs('public/image',$fileNameToStore),
            "photo" => $name,
        );
        $adm_id = Admission::create($data);


        // code to store data at student_log table
        $data_to_store_at_student_log_table = array(
            "act_type" => "admission","act_typ_auto_id" => $adm_id->id,"created_by" => $user_id,
        );

        Students_log::create($data_to_store_at_student_log_table);


        return redirect('/admission')->with('success','Form submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Admission::find($id)){
            $findDataById = Admission::find($id);
            $cls = Class_table::where('id',$findDataById->class)->first();
            return view('admission.admissionInformation',compact(['findDataById','cls']));
        }else{return "No respective information availabe for ID = {$id}";}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getData = Admission::find($id);
        $cls = Class_table::get();
        return view('admission.editAdmissionInformation',compact(['getData','cls']));
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

        $getData = Admission::find($id);
        $name="";

        $getData->name = $request->input('name');
        $getData->father = $request->input('father');
        $getData->mother = $request->input('mother');
        $getData->class = $request->input('class');
        $getData->gender = $request->input('gender');
        $getData->contactNo = $request->input('contactNo');
        $getData->birthDate = $request->input('birthDate');
        $getData->mailingAddress = $request->input('mailingAddress');
        $getData->permanentAddress = $request->input('permanentAddress');
        $getData->localGurdianName = $request->input('localGurdianName');
        $getData->localGuardianContactNo = $request->input('localGuardianContactNo');
        $getData->publish = $request->input('publish');
        $getData->updated_by = $user_id;
        if($file = $request->file('photo')){
            $albm = $getData->photo;
            $filename = public_path() . '/image/Admission/' . $albm;

            \File::delete($filename);

            $name = rand() .$file->getClientOriginalName();
            $file->move(public_path('image/Admission'), $name);
            $getData->photo = $name;
        }

        $getData->save();

        // return redirect('/admission/'.$id)->with('success','Form Updated');
        return redirect(route('admission.edit',$id))->with('success','Form Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getData = Admission::find($id);
        $albm = $getData->photo;
        $filename = public_path() . '/image/Admission/' . $albm;

        \File::delete($filename);

        $getData->delete();

        return redirect('/admission');
    }
}
