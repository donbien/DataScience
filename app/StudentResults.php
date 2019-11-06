<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentResults extends Model
{
public $fillable = ['student_number', 'unit_name', 'unit_code', 'status','class','marks'];


  public function student()
    {
        return $this->belongsTo('App\Students', 'student_number', 'student_number');
    }
}
