<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher_info_two extends Model
{
    protected $fillable = ['teacher_id','degree','passing_year','batch','department','organization_name','result','board','created_by','updated_by','publish',];
}
