<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{


  public $fillable = ['student_number','faculty', 'unit_name', 'unit_code', 'type_of_application','letter_of_reason'];


}
