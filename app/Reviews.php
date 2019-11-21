<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{


  public $fillable = ['id', 'application_id', 'staff_id', 'comment'];


}
