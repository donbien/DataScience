<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
 public $fillable = ['name', 'email_address', 'faculty'];
}
