<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
     protected $fillable = ['sport', 'movie', 'book','club'];
}
