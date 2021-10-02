 <!-- resources/views/hotelsregister.blade.php -->
 @extends('layouts.app')
 @section('content')
  @if( Auth::check() )
     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             Hotel登録
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- Hotel登録フォーム -->
         <div>
         
            <form action='{{ route('hotels_add') }}'  method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- ホテル情報 -->
                <div class="form-group">
                    <div class="col-sm-6">
                        
                     <p>ホテル名</p>
                        <input type="text" name="h_name" class="form-control">
                      <p>ロケーション</p>
                        <input type="text" name="h_location" class="form-control">
                      <p>ホテルLink</p>
                        <input type="text" name="h_link" class="form-control">
                      <p>プライス</p>
                        <input type="text" name="h_price" class="form-control">
                       
                      @if ($errors->any())
                        <div class="errors">
                             <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                             </ul>
                        </div>
                        @endif
                        
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="fileUploader" type="file" name="h_img" accept='image/' enctype="multipart/form-data" multiple="multiple" required>
                            </div>
                        
                                  
                </div>
           
                
                <!-- ホテル 登録ボタン -->
                 <div class="form-group">
                       <div class="col-sm-offset-3 col-sm-6">
                           <button type="submit" class="btn btn-primary">
                               Save
                           </button>
                       </div>
                 </div>
             </form>
     </div>
     
    
     <!-- Book: 既に登録されてる本のリスト -->
     @endif
 @endsection
 @yield('hotels_add')
 
 
