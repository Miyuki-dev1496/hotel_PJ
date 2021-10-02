<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
//   // リレーションシップ
//     public function attachments() {

//         return $this->hasMany('App\Attachment', 'parent_id', 'id')
//             ->where('model', self::class);  // 「App\Customer」のものだけ取得

//     }
     // Userテーブルとのリレーション （従テーブル側）
     public function user() {
        return $this->belongsTo('App\User');
    }
    
     // Userテーブルとのリレーション （多対多）
    public function favo_user() {
        return $this->belongsToMany('App\User');
    }
}



