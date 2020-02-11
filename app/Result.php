<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['student_table_id','subject_name','obtain_marks','out_of','created_by','updated_by',];
}
