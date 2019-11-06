<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
     public $fillable = ['faculty','study_year','session_start', 'session_end', 'unit_name', 'unit_code', 'day_of_the_week','time','lecturer'];
}
