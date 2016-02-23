<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     protected $fillable = ['home_town', 'current_town', 'favorite_town','user_id'];
}
