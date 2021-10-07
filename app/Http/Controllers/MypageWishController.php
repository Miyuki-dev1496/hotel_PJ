<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use App\MyPage;
use Auth;
use Validator;
use Illuminate\Support\Str;

class MypageWishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    
     
    public function index()
    {
        $user = Auth::user();   
        $hotels = Hotel::get();
        
        if (Auth::check()) {
             //ログインユーザーのお気に入りを取得
             $favo_hotels = Auth::user()->favo_hotels()->get();
             $id = Auth::id();
             
              return view('mypageWish',[
            'hotels'=> $hotels,
            'favo_hotels'=>$favo_hotels,
            'id'=>$id,
            'user'=>$user
            ]);
            
        }else{
            
            return view('hotelpage',[
            'hotels'=> $hotels, 'user'=>$user
            ]);
            
        }
        
        
        // $favo_hotels = User::findOrFail($id);
     
        // $tag = Tag::find($id);
        
        //ログイン中のユーザーを取得
        // $user = auth()->user();
        // $hotel->hotel()->allRelatedIds($user);
        // $user = Auth::user();
        // $hotels = User::find($user);// user_id= のデータを取得
        // // $favo_hotels = $user01->favo_hotels; // User.php で定義したメソッド
        // // dd($favo_hotels,$user01); // 結果を見たいから一旦動作を停止させる
             //ユーザが持っているスキルを取得
        // $user = auth()->user();
        // // foreach($user->hotels as $hotel) {
        // //     var_dump($hotel->h_name); //string(10) "JavaScript" string(15) "Webデザイン" string(4) "HTML" string(3) "CSS"
        // // }
        
        // // $favo_hotels = $hotels->favo_hotels;
        //  return view('mypageWish',[
        //     'user'=> $users,
            
        //     ]);
            // 全ての投稿を取得
        
        // //ログイン中のユーザーを取得
        // $user = Auth::user();
        
        // //お気に入りする記事
        // $hotel = Hotel::find($hotel_id);
        
        // //リレーションの登録
        // $hotel->favo_user()->attach($user);
        
        // return redirect('/mypageWish');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
