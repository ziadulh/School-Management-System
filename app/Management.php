<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = ['name','father','mother','gender','birthDate','contactNo','profession','mailingAddress','permanentAddress','publish','photo','created_by','updated_by'];
}
