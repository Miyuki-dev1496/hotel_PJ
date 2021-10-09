 @extends('layouts.app')
 @section('content')
<!doctype html>
<body>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.79.0">
        <title>Profile Edit</title>
        
    
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
         <!-- Styles -->
        <link href="{{ asset('css/uploader.css') }}" rel="stylesheet">
            <!-- Scripts -->
        <script src="{{ asset('js/uploader.js') }}" defer></script>

            <!-- Bootstrap core CSS -->
        <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }
    
          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
          
          @target {
            width : 500px;
            heigh : 500px;
          }
          
             input#profile_image {
                display: none;
            }
          
        </style>
    </head>
    

<div class="container">
    <h1>Profile Image Upload 
        <small>with preview</small>
    </h1>
    <div class="avatar-upload">
        <form method="post" action="{{ url ('profile/'.optional($user)->id) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="avatar-edit">
                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                <label for="imageUpload"></label>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
            Change
            </button>
        </form>
    </div>
    <div>
       
    </div>
</div>



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