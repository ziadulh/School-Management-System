<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Admission;
use App\Student;
use App\Students_log;

class sendMailController extends Controller
{

    public function send(Request $request){


        $data = $request->input('student_id');

        if (isset($_POST['sendMail'])) {

            if($data){
                foreach ($data as $key => $da) {
                    $data = Admission::find($da);
                    Mail::send(new sendMail($data));
                }
                return redirect('/admission')->with('success','Mail has Sent to selected applicant');
            }else return "no one is selected to send confirmation mail that they are passed";

        } else if (isset($_POST['store'])) {


            if($data){
                $user_id = auth()->user()->id;
                $array_to_identify_which_ids_are_already_pusher = [];

                foreach($data as $data){
                    $ad_table_data = Admission::find($data);

                    // $check_whether_already_moved = Student::where('admission_id',$data)->select('admission_id')->find($data);
                    // dd($check_whether_already_moved->admission_id);exit;

                    if(!(Student::where('admission_id',$data)->first())){
                        $albm = $ad_table_data->photo;
                        $old_path = public_path() . '/image/Admission/' . $albm;
                        $new_path = public_path().'/image/Current_Students/'.$albm;
                        \File::copy($old_path, $new_path);

                        $data_to_store_sutdent_table = array(
                            "admission_id" => $ad_table_data->id,
                            "name" => $ad_table_data->name,
                            "father" => $ad_table_data->father,
                            "mother" => $ad_table_data->mother,
                            "class" => $ad_table_data->class,
                            "email" => $ad_table_data->email,
                            "gender" => $ad_table_data->gender,
                            "contactNo" => $ad_table_data->contactNo,
                            "birthDate" => $ad_table_data->birthDate,
                            "mailingAddress" => $ad_table_data->mailingAddress,
                            "permanentAddress" => $ad_table_data->permanentAddress,
                            "localGurdianName" => $ad_table_data->localGurdianName,
                            "localGuardianContactNo" => $ad_table_data->localGuardianContactNo,
                            "created_by" => $user_id,
                            "publish" =>$ad_table_data->publish,
                            "photo" => $albm,
                        );

                        $current_student_table_id = Student::create($data_to_store_sutdent_table);

                        $data_to_store_student_log_table = array(
                            "act_type" => "Newly Admitted","act_typ_auto_id" => $current_student_table_id->id,"created_by" => $user_id,
                        );

                        Students_log::create($data_to_store_student_log_table);
                    }else{
                        array_push($array_to_identify_which_ids_are_already_pusher, $data);
                    }

                }

                if(count($array_to_identify_which_ids_are_already_pusher)>0){
                    echo "already Pushed : ";
                    foreach ($array_to_identify_which_ids_are_already_pusher as $key => $value) {
                        print_r($value); echo"  ";
                    }
                    echo"remaining are sent to current_student table";
                }
                return redirect('/student')->with('success','students information are copied to student table whiches  are not copied yet');
            }else return "no one is selected to send confirmation mail that they are passed";
        } else {
            // this else kept if there need to add another submit button
            return "No actino found for ";
        }
    }



    // public function send(Request $request, $id){
    //     $data = Admission::find($id);
    //     Mail::send(new sendMail($data));
    // }

    // public function send(Request $request){

    //     $student_ids = $request->input('student_id');


    //     Mail::send(new sendMail($student_ids));

    //     // foreach ($student_ids as $key => $student_ids) {
    //     //         $data = Admission::find($student_ids);
    //     //         Mail::send(new sendMail($data));
    //     // }

    // }

    public function store(){
        return "Hello";
    }
}
