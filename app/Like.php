<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
      public function hotel(){
        return $this->belongsTo('App\Hotel');
    }

      public function user(){
        return $this->belongsTo('App\User');
    }
}
