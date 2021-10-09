<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\User;
use App\MyPage;
use Auth;
use Validator;
use Illuminate\Support\Str;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
         //
        $hotels = Hotel::orderBy('created_at', 'desc')->get();
       
        // //ログインユーザーがこのホテルをLikeしているかどうか
        // $isliked = Auth::user()->favo_hotels()->where('hotel_id',$this->hotels->id)->exists();
        
        return view('hotels')
            ->with([
                'hotels' => $hotels,
                // 'isliked' => $isliked
            ]);
            
       
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //バリデーション
        $validator = Validator::make($request->all(), [
        'h_name' => 'required|max:255',
        'h_img' => 'required|file|image',
        ]);
        
        
        // 画像ファイル取得
        $file = $request->h_img;
        
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }
        
        
        // 以下に登録処理を記述（Eloquentモデル）
        // Eloquent モデル
        $hotels = new Hotel;
        // $hotels->favo_user()->attach(request()->users); //relation to userscd 
        $hotels->h_name = $request->h_name;
        $hotels->h_location = $request->h_location;
        $hotels->h_latitude = $request->h_latitude;
        $hotels->h_longtitude = $request->h_longtitude;
        $hotels->h_link = $request->h_link;
        $hotels->h_price = $request->h_price;
        // $hotels->h_img = str_replace('public/', 'storage/', $filename);  //画像パスの格納
        // ファイルの拡張子取得
        $ext = $file->guessExtension();

        //ファイル名を生成
        $fileName = Str::random(32).'.'.$ext;

        // 画像のファイル名を任意のDBに保存
        $hotels->h_img = $fileName;
        $hotels->user_id = Auth::id();//ここでログインしているユーザidを登録しています
        $hotels->favorite_id = $request->favorite_id;
        $hotels->wishlist_id = $request->wishlist_id;
        $hotels->stars_id = $request->stars_id;
        $hotels->created_at = now();
        $hotels->updated_at = now();
        
        $hotels->save();
        
        
        //public/uploadフォルダを作成
        $target_path = public_path('/hotelImages/');

        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);
        
        $hotels = Hotel::orderBy('created_at', 'asc') ->first();
        
        //保存処理後一覧ページに飛ばす 
        return view ('hotels',[
            'hotels' => $hotels
            ]);
        
        
        
    }

        
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
        return view('hotelsedit', ['hotel' => $hotel]);
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
        'h_name' => 'required|max:255',
        'h_img' => 'nullable|file|image',
        ]);
        
        //バリデーション:エラー 
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
      
        $hotels = Hotel::find($request->id);
        $hotels->h_name = $request->h_name;
        $hotels->h_location = $request->h_location;
        $hotels->h_latitude = $request->h_latitude;;
        $hotels->h_longtitude = $request->h_longtitude;
        $hotels->h_link = $request->h_link;
        $hotels->h_price = $request->h_price;
        $hotels->favorite_id = $request->favorite_id;
        $hotels->wishlist_id = $request->wishlist_id;
        $hotels->stars_id = $request->stars_id;
        $hotels->created_at = now();
        $hotels->updated_at =  now();
        
        
        
        // //画像の確認
        // // 元ファイルの名前取得、存在確認
        //     $fileName = $request->file->getClientOriginalName();　//元ファイル名を取得します。
        //     $exists = Storage::disk($this->filesystem)->exists($request->upload_path.'/'.$fileName);　//元ファイルと同名のファイルがあるか確認します。
 
        //     if ($exists) {
        //         Storage::disk($this->filesystem)->delete($request->upload_path.'/'.$fileName);　元ファイルと同名のファイルがあるとき一旦削除します
        //     }
            
            
            
        $contents = Storage::get('file.jpg');    
            
            
        // 画像ファイル取得
        $file = $request->h_img;
        //画像のextention取得
        $ext = $file->guessExtension();
        //ファイル名を生成
        $fileName = Str::random(32).'.'.$ext;
        // 画像のファイル名を任意のDBに保存
        $hotels->h_img = $fileName;
       
       
        
        
        $hotels->save(); 
        return redirect('/mypage/{user_id}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
        $hotel->delete();
        return redirect('hotels');
    }
    
     public function form()
    {
       
    }
    
   
     
     
}
