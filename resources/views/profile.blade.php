 @extends('layouts.app')
 @section('content')
<!doctype html>
<body>
    <head>
         <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Styles -->
            <link href="{{ asset('css/uploader.css') }}" rel="stylesheet">
            <!-- Scripts -->
            <script src="{{ asset('js/uploader.js') }}" defer></script>
      
        
    </head>
<style>
   input#profile_image {
                display: none;
            }
</style>
<div class="container">
    <h1>Profile Image Upload 
        <small>with preview</small>
    </h1>
    <div class="avatar-upload">
        <div class="avatar-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
            <label for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            
            </div>
        </div>
    </div>
</div>

<form method="post" action="{{ route('users.update', ['user' => optional($user)->id]) }}" enctype="multipart/form-data">
  @csrf
  @method('PATCH')

  <label for="profile_image">プロフィール画像</label>

  <label for="profile_image" class="btn">
    <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img">
    <input id="profile_image" type="file"  name="profile_image" onchange="previewImage(this);">
  </label>

  <button type="submit" class="btn btn-primary">
    Change
  </button>
</form>

<script>
  function previewImage(obj)
  {
    var fileReader = new FileReader();
    fileReader.onload = (function() {
      document.getElementById('img').src = fileReader.result;
    });
    fileReader.readAsDataURL(obj.files[0]);
  }
</script>
</body>
@endsection