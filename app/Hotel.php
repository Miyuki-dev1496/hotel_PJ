<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class Hotel extends Model
{
//   // リレーションシップ
//     public function attachments() {

//         return $this->hasMany('App\Attachment', 'parent_id', 'id')
//             ->where('model', self::class);  // 「App\Customer」のものだけ取得
    protected $fillable = [
        'user_ud', 'hotel_id', 'h_name','h_location','h_latitude','h_longtitude','h_link','h_price','h_img','comment','favorite_id','wishlist_id','stars_id',
    ];

//     }
     // Userテーブルとのリレーション （従テーブル側）
     public function user() {
        return $this->belongsTo('App\User');
    }
    
     // Userテーブルとのリレーション （多対多）
    public function favo_user(int $favo_user = null) {
        return $this->belongsToMany('App\User');
    }
}



