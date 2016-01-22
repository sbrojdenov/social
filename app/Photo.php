<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
   protected $fillable=[
      'user_id',
       'photos',
       'avatar'
    ];
   
   public function user(){
       return $this->belongsTo('App\User');
   }
}
