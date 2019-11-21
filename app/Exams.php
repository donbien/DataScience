<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
 public $fillable = ['date', 'unit_name_code', 'start_time', 'group','venue'];



}
