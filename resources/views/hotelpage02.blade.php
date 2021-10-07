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
    
<!--<header>-->
<!--  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">-->
<!--    <div class="container-fluid">-->
      
<!--      <div class="collapse navbar-collapse" id="navbarCollapse">-->
<!--        <ul class="navbar-nav me-auto mb-2 mb-md-0">-->
<!--          <li class="nav-item active">-->
<!--            <a class="nav-link" aria-current="page" href="#">Home</a>-->
<!--          </li>-->
<!--          <li class="nav-item">-->
<!--            <a class="nav-link" href="#">Link</a>-->
<!--          </li>-->
<!--          <li class="nav-item">-->
<!--            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--          </li>-->
<!--        </ul>-->
<!--        <form class="d-flex">-->
<!--          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
<!--          <button class="btn btn-outline-success" type="submit">Search</button>-->
<!--        </form>-->
<!--      </div>-->
<!--    </div>-->
<!--  </nav>-->
<!--</header>-->

<main>

   
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" max-height=500px>
   
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    
    <div class="carousel-inner">
       
      <div class="carousel-item active">
        
        <img class="d-block w-80" src="/hotelImages/{{ optional($hotel)->h_img }}" x="0" y="0"  width="auto" height="225"/>
        
        <h5 type=hidden>{{ optional($hotel)->h_name }}</h5>
        <!--<p>...</p>-->
      </div>
      
      <div class="carousel-item">
        <img class="d-block w-80" src="/hotelImages/3hoAkcgE4zuMn9Czcwidlkj9MsnfhxMl.jpg" width="auto" height="225">
        <h5 type=hidden>{{ optional($hotel) ->h_name }}</h5>
        <!--<p>...</p>-->
      </div>
      <div class="carousel-item">
         <img class="d-block w-80" src="/hotelImages/{{ $hotel['h_img'] }}" x="0" y="0"  width="auto" height="225"/>
        <h5 type=hidden>{{ optional($hotel) ->h_name  }}</h5>
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
  
  
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">{{ optional($hotel) ->h_name }}</h1>
     
      @if(Auth::check())
      
	    @if(Auth::id() !=optional( $hotel)->user_id && $hotel->favo_user()->where('user_id',Auth::id())->exists() !== true)
     <form action="{{ route('favo', [$hotel['id']]) }}" enctype="multipart/form-data" method="POST">
    	{{ csrf_field() }}
    	<!--<input type="hidden" name="hotel_id" value="{{$hotel->id}}">-->
      <button type="submit" class="btn btn-danger">
      お気に入り
      </button>
      </form>
      @else
      <form action="{{ route('favo_delete',[$hotel['id']]) }}" method="POST" >
      {{ csrf_field() }}
      <!--<input type="hidden" name="hotel_id" value="{{$hotel->id}}">-->
      <button type="submit" class="btn btn-danger">
      お気に入りから外す
      </button>
      </form>
    
      @endif
      @endif
      <p class="lead my-3">{{ optional($hotel) ->h_location }}</p>
      <p class="lead mb-0"><a href={{ (optional($hotel) ->h_link )}}</a>Link</p>
    </div>
  </div>
  
 
 
  <!--<div class="row mb-2">-->
  <!--  <div class="col-md-6">-->
  <!--    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">-->
  <!--      <div class="col p-4 d-flex flex-column position-static">-->
  <!--        <strong class="d-inline-block mb-2 text-primary">World</strong>-->
  <!--        <h3 class="mb-0">Featured post</h3>-->
  <!--        <div class="mb-1 text-muted">Nov 12</div>-->
  <!--        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
  <!--        <a href="#" class="stretched-link">Continue reading</a>-->
  <!--      </div>-->
  <!--      <div class="col-auto d-none d-lg-block">-->
  <!--        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->

  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--  <div class="col-md-6">-->
  <!--    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">-->
  <!--      <div class="col p-4 d-flex flex-column position-static">-->
  <!--        <strong class="d-inline-block mb-2 text-success">Design</strong>-->
  <!--        <h3 class="mb-0">Post title</h3>-->
  <!--        <div class="mb-1 text-muted">Nov 11</div>-->
  <!--        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
  <!--        <a href="#" class="stretched-link">Continue reading</a>-->
  <!--      </div>-->
  <!--      <div class="col-auto d-none d-lg-block">-->
  <!--        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->

  <!--      </div>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">
    
  <!--<div class="album py-5 bg-light">-->
  <!--  <div class="container">-->
  <!--    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">-->
       
  <!--      <div class="col">-->
  <!--        <div class="card shadow-sm">-->
            
  <!--          <img class="bd-placeholder-img card-img-top" src="/hotelImage/9Gjsrq6G2wBlIJvIrYFhJRaHi2yFwDT0" x="0" y="0"  width="100%" height="225"/>-->
            
  <!--          <div class="card-body">-->
  <!--            <p class="card-text">"test"</p>-->
  <!--              <div class="btn-group">-->
  <!--                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>-->
  <!--                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>-->
  <!--              </div>-->
  <!--              <small class="text-muted">9 mins</small>-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->
       
  <!--    </div>  -->

    <!-- Three columns of text below the carousel -->
    <div class="row">
    @if($favouseres->isEmpty())  
       @foreach ($favousers as $favouser)
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
        <rect width="100%" height="100%" fill="#777"/>
        <a  href="{{ url ('mypage/'.$favouser->id) }}">
        <img class="bd-placeholder-img card-img-top" src={{ asset('/images/profile.png')}} ></a>
        <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
      </div>
        @endforeach
        <h2>"{{ $favouser ['name']}}"</h2>
     
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    
    

  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>

@endsection