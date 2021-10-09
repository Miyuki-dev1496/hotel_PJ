<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel; //この行を上に追加
use App\User;//この行を上に追加
use App\Like;//この行を上に追加
// use App\Mypage;//この行を上に追加
use Auth;//この行を上に追加
use Validator;//この行を上に追加


class FavoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    
    
    //ホテルお気に入り登録
     public function favo($id)
    {
        
        //ログイン中のユーザーを取得
        $user = Auth::user();
        
        //ログインユーザーがお気に入りしているかどうか
        // $isliked = Auth::user()->favo_hotels()->where('hotel_id',$id)->get();
        $isliked = Auth::user()->favo_hotels()->where('hotel_id',$id)->exists();
        
        // $favouser_id = $user->favo_hotels()->where('user_id',$id)->first();
        // $favouser_id = Auth::user()->favo_hotels()->orderBy('user_id')->get();
        // $favouser_id = $isliked->favo_hotels()->pivot->user_id;
        // dd($isliked);
        
        if ($isliked!=true) {
           
            //お気に入りするHotel
            $hotel = Hotel::find($id);
            // dd($hotel);
            
            //リレーションの登録
            $hotel->favo_user()->attach($user);
            
           
            // if($request->'user_id')->isValid()){
            return redirect()->route('hotel_show',
            ['id' => $id,
                'hotel'=> $hotel,
                'user' => $user,
                'isliked' => $isliked
                ]);
               
        } else {
            
            //ログイン中のユーザーを取得
            $user = Auth::user();
             //お気に入りするHotel
            $hotel = Hotel::find($id);
            //ログインユーザーがお気に入りしているかどうか
            $isliked = Auth::user()->favo_hotels()->where('hotel_id',$id)->exists();
            
            //ログインユーザーと紐づいたデータ
            $favodata = Auth::user()->favo_hotels()->where('hotel_id',$id)->get();
            
            //リレーションの削除
            $user->favo_hotels()->detach();
           
            return redirect()->route('hotel_show', 
            ['id' => $id,
                'hotel'=> $hotel,
                'user' => $user,
                'isliked' => $isliked
                ]);
           
       
        }
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
    
    
    
  
        //  public function isLiked($id): bool {
         
         
    //     $likes = Hotel::select('hotel_id')->where('user_id',Auth::user()->id)->get();
    //     dd($likes);
        
       
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // //お気に入りを外す
    // public function destroy($id)
    // {  
    //     dd($id);
    // //   //このホテルのパラメーター取得
    // //     $hotel_id = $request->hotel_id;
    //     //ログイン中のユーザーを取得
    //     $user = Auth::user();
        
    //     // $favodata = Hotel::find()->favo_user->where('user_id',Auth::user())->get();
    //     // $favodata =  Hotel::where(['hotel_user.hotel_id',$hotel_id],['user_id', Auth::user()->id])->get();
    //     $favodata =  Hotel::find('id')->favo_user->where(['hotel_id',$id],['user_id', Auth::user()->id])->get();
    //     // dd($favodata);
        
    //     //リレーションの削除
    //     // $favodata->detouch($user);
        
    //     return view('hotelpage') 
        
    //     ->with([
    //           'hotel'=> $hotel,
    //         //   'id' =>$id,
    //           'user' => $user,
    //           'favouser' => $favouser
    //         ]);
    //     //リレーションの削除
    //     //  $favodata->favo_user()->delete();
           
    //     // return redirect('hotelpage')
    //     // //  return view('/hotelpage');
    //     //  ->with([
    //     //       'hotel'=> $hotel[$hotel_id],
    //     //       //   'id' =>$id,
    //     //       'favodata' => $favodata,
    //     //       'user' => $user,
    //     //     ]);
        
        
    
    // }
    
    // public function destroy(Request $request, $id) {
    //     $like=Like::findOrFail($id);

    //     $like->favo_hotels()->delete();

    //     return redirect()->route('hotelpage',[$request->hotel_id]);
    // }
    // public function isLikedByMe($id){
        
    // $hotel = Hotel::findOrFail($id)->first();
    // if (Hotel::whereUserId(Auth::id())->whereHotelId($hotel->id)->exists()){
    //     return 'true';
    // }
    // return 'false';
    // }
    
    
    // public function like(Hotel $hotel){
        
    //     $existing_like = HotelUser::withTrashed()->whereHotelId($hotel->id)->whereUserId(Auth::id())->first();
    
    //     if (is_null($existing_like)) {
    //         HotelUser::create([
    //             'hotel_id' => $hotel->id,
    //             'user_id' => Auth::id()
    //     ]);
        
    //     } else {
    //         if (is_null($existing_like->deleted_at)) {
    //             $existing_like->delete();
    //         } else {
    //             $existing_like->restore();
    //         }
    //     }
    // }
}