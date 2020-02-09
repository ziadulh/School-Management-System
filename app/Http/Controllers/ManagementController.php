<?php

namespace App\Http\Controllers;

use App\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $management_data = Management::get();
        return view('Management.list',compact('management_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Management.form');
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
            "name" => 'required', "father" => 'required', "mother" => 'required', "gender" => 'required', "birthDate" => 'required', "profession" => 'required', "contactNo" => 'required', "permanentAddress" => 'required', 'mailingAddress' => 'required', 'photo' => 'required', 'publish' => 'required',

        ]);

        $user_id = auth()->user()->id;
        $name='';
        if($file = $request->file('photo')){
            $name = rand().$file->getClientOriginalName();
            $file->move(public_path('image/Management'), $name);}

        $data = array(
            "name" => $request->input('name'),
            "father" => $request->input('father'),
            "mother" => $request->input('mother'),
            "gender" => $request->input('gender'),
            "birthDate" => $request->input('birthDate'),
            "contactNo" => $request->input('contactNo'),
            "profession" => $request->input('profession'),
            "mailingAddress" => $request->input('mailingAddress'),
            "permanentAddress" => $request->input('permanentAddress'),
            "photo" => $name,
            "created_by" => $user_id,
            "publish" => $request->input('publish'),

        );

        Management::create($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $management_data = Management::find($id);
        return view('Management.show',compact('management_data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function edit(Management $management)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Management $management)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Management  $management
     * @return \Illuminate\Http\Response
     */
    public function destroy(Management $management)
    {
        //
    }
}
