 @extends('layouts.app')
 @section('content')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Hotel Main Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

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
    </style>

    
    <!-- Custom styles for this template -->
  <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    

<main>

   
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" max-height=500px>
   
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner">
       
      <div class="carousel-item active">
        <!--このホテルの画像-->
        <img class="d-block w-80" src="/hotelImages/{{ optional($hotel)->h_img }}" x="0" y="0"  width="auto" height="300"/>
       
        <!--<p>...</p>-->
      </div>
      
      <div class="carousel-item">
        <img class="d-block w-80" src="/hotelImages/3hoAkcgE4zuMn9Czcwidlkj9MsnfhxMl.jpg" width="auto" height="300">
        
        <!--<p>...</p>-->
      </div>
      <div class="carousel-item">
         <img class="d-block w-80" src="/hotelImages/{{ $hotel['h_img'] }}" x="0" y="0"  width="auto" height="300"/>
        
        <!--<p>...</p>-->
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
   

  </div>

 
  
  
  <!--hotel main-->
  <main>
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <!--ホテル名-->
    <div class="col-md-6 px-0">
      <b><h1 class="display-4 font-italic" style=font-size:30px,font-weight:50;>{{ optional($hotel) ->h_name }}</h1></b>
     　<!--お気に入り表示-->
        @if(Auth::check())
      
    	    @if ($isliked !=true )
              <form type=hidden action={{ route('favo', [$hotel['id']]) }} method="POST">
            	{{ csrf_field() }}
              <button type="submit" class="btn btn-danger">
              お気に入り
              </button>
              </form>
          @else
              <form type=hidden action={{ route('favo_delete',[$hotel['id']]) }} method="POST" >
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger">
              お気に入りから外す
              </button>
              </form>
          @endif
        @endif
        
        
      <p class="lead my-3">{{ optional($hotel) ->h_location }}</p>
      <p class="lead mb-0"><a href={{ (optional($hotel) ->h_link )}}</a>Hotel Link</p>
    </div>
  </div>
  
 
 
  
  <div class="container marketing" width="900px">
    <!--お気に入りに登録しているユーザーインデックス-->
     <!-- Three columns of text below the carousel -->
    <div class="row">
      @if(!is_null($favousers))
      @foreach ($favousers as $favouser) 
      <div class="col-lg-4" style="padding:50px;">
        <svg class="bd-placeholder-img rounded-circle" width="30" height="30">
        <a  href="{{ url ('mypage/'.$favouser['id'] )}}">
        <img class="bd-placeholder-img card-img-top" src={{ asset('/images/profile.png')}} width="3%" height="auto"></a></svg>
        <!--<rect width="80%" height="80%" fill="#777"/>-->
        <h2>username {{ $favouser['name'] }}</h2>
        <p class="card-text">{{ $favouser->name}}</p>
        <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>-->
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      @endforeach
      @endif
    
      
    </div><!-- /.row --> 
    
</div>    
</main>
  
  <!-- FOOTER -->
  <footer class="container">
     <a href="{{ url('/') }}">Back to top</a>
    <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>

@endsection