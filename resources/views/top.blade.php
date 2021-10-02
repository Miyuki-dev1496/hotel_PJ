 <!-- resources/views/top.blade.php -->

 @extends('layouts.app')
 @section('content')

    <!DOCTYPE html>
    <html lang="ja">
    <head>
      <meta charset="utf-8">
    　<meta name="viewport" content="width=device-width, initial-scale=1">
      <title>HoteList</title>
      <link rel="stylesheet" href="{{ asset('/css/style.css') }}" >
    </head>
    <body>
      <div class="bg_rgba">
          <img src="{{ asset('/images/hotelist01.png')}}">
      </div>
    </body>
    </html>
@endsection