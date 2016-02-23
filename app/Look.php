<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Look extends Model
{
     protected $fillable = ['height', 'eyes', 'hair','weight','user_id'];
}
