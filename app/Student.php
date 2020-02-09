<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['admission_id','name','father','mother','class','email','gender','contactNo','birthDate','mailingAddress','permanentAddress','mailingAddress','localGurdianName','localGuardianContactNo','photo','created_by','updated_by','publish',];
}
