<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    protected $fillable = ['name','father','mother','class','gender','contactNo','birthDate','mailingAddress','permanentAddress','localGurdianName','localGuardianContactNo','photo','created_by','updated_by','publish'];
}
