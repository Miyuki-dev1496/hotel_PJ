<?php
use App\Hotel;
use App\User;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\MypageController;
use App\Mypage;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//ログイン認証処理
Route::get('/', function () {
    return view('top');
});
Auth::routes();

// home画面
Route::get('/home', 'HomeController@index')->name('home');


// Route::get('hotels/create', 'HotelsController@create'); // 送信フォーム
// Route::post('ajax/hotels', 'HotelsController@store');   // Ajaxでデータを受け取る
// Route::get('hotels/test', 'HotelsController@test');     // テスト用


//Hotelistにホテルのインデックス表示
Route::get('/hotels', 'HotelsController@index' )->name('hotels_index');

// 新ホテルを追加 to Hotelist
Route::post('/hotels','HotelsController@store')->name('hotels_add');

// ホテルを削除
Route::delete('/hotel/{hotel}','HotelsController@destroy');

//「ホテル」を更新画面表示
Route::get('/hotelsedit/{hotel}','HotelsController@edit');

//「ホテル」を更新処理
Route::post('hotels/update','HotelsController@update');

//MyPageに自分の登録したホテルのインデックス表示
Route::get('/mypage/{user_id}', 'MypageController@index');

//hotelpageの表示
Route::get('/hotelpage/{hotel_id}', 'FavoController@index');

//hotelpageのお気に入り処理
Route::get('/hotelpage/{hotel_id}', 'FavoController@favo');

//Mypageにお気に入り登録をしたホテルのインデックス表示
Route::get('/wishlist/{user_id}','WishlistController@index');

//UserslistにUserのインデックス表示
Route::get('/userslist', 'UsersController@index' )->name('users_index');

//Follow
Route::post('/userslist/user_id', 'FollowUserController@follow')->name('follow');
//Unfollow
Route::post('/userslist/unfollow', 'FollowUserController@unfollow')->name('unfollow');

// Route::get('mypage/{auth()->user()->id}', 'MypageController@index');
// //MyPageに自分のホテルのインデックス表示
// Route::middleware('auth')->group(function () {
// Route::view('mypage', 'mypage')->name('mypage');
// 
// //Hotelページの表示
// Route::get('/hotelpage/{hotel_id}','FavoController@index');

// //Hotelお気に入り登録処理
// Route::post('/hotelpage/{hotel_id}','FavoController@favo');

// Route::post('hotel_page/{hotel_id}', 'HotelsController@favo');
// Route::get('/mypage', 'MypageController@index' ); 

// //画像アップロード画面表示
// Route::get('/mypage','ImgController@index');

// //画像アップロード処理
// Route::post('/img/upload','ImgController@upload');

// Route::post('/upload/{id}', 'ImgController@store');

//ホテリストの画面
// Route::get('/hotels', function () {
//     return view('hotels');
// });

// //My Pageの画面
// Route::get('/mypage', function () {
//     return view('mypage');
// });

//ホテル登録画面
Route::get('/hotelsregister', function () {
    return view('hotelsregister');
});



Route::get('/map', function () {
    return view('
    Test');
});



// Route::get('/wishlist/{user_id}', function () {
//     return view('
//     mypageWish');
// });



