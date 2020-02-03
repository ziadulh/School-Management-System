<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name','father','mother','gender','contactNo','birthDate','mailingAddress','permanentAddress','created_by','updated_by','publish','photo'];
}
