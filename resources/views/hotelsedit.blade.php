@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
        <form action="{{ url('hotels/update') }}" method="POST">
            <!-- hotel_name -->
            <div class="form-group">
                <label for="h_name">ホテル名</label>
                <input type="text" name="h_name" class="form-control" value="{{$hotel->h_name}}">
            </div>
            
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
                        
            
            
         @if(Auth::check())
            <div class="well well-sm" style=display:inline-flex margin-left="10px">
                 
                 
                    <!-- Save ボタン -->
                　　<form action="{{ url('hotels/update'.$hotel->id) }}" method="POST">
                	{{ csrf_field() }}
                	<button type="submit" class="btn btn-primary">
                	Save
                	</button>
                　　</form>
                    <!--/ Deleteボタンン -->
                    <form action="{{ url('hotel/'.$hotel->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }} 
                        <button type="submit" class="btn btn-primary">
                        Delete
                        </button>
                    </form>
                    <!--Backボタン-->
                    <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
                    
            </div>
            <form>
              <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$hotel->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
            </form>
        @endif
    </div>
</div>
@endsection