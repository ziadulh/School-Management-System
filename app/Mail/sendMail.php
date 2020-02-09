<?php

namespace App\Mail;
use App\Admission;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $name, $email, $loop_control;
    public $name, $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->email = $data->email;
        $this->name = $data->name;

        // $this->loop_control = count($data);
        // dd($student_ids);exit;
        // foreach ($student_ids as $key => $student_ids) {
        //     $test = Admission::find($student_ids);
        //     $this->name[$key] = $test->id;
        //     $this->email[$key] = $test->email;
        // }

        // $test = Admission::find(2);
        // dd($test);exit;
        // print_r($this->name);exit;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        return $this->subject('Test Mail')->view('mail',['name' => 'Ziadul'])->to($this->email)->with('data',$this->name);


        // $arr = [1,2];
        // foreach ($arr as $key => $value) {
        //     return $this->subject('Test Mail')->view('mail',['name' => 'Ziadul'])->to($this->email[$key])->with('data',$this->name[$key]);
        // }

    }
}
