<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mypage extends Model
{
     public function posts()
    {
        return $this->hasManyThrough('App\Models\Hotel', 'App\Models\User');
    }
}
