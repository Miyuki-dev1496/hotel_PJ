<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="utf-8">
        <title>Hotel Map</title>
        <style>
            #taget{
            width:500px;
            height:500px;
        </style>
    </head>
    <body>
      
    <div id="target">
        
    </div>
    <div>
      <p>Google Map</p>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyB8yMxBqL8PNWMPHWoR8RkmqQUEpuGGvto&callback=initMap" async defer></script>
    <script>
      function initMap(){
        'use srtrict';
        //描画領域取得
        var target =document.getElementById('target');
        
        var map;
        
        var tokyo ={lat:35.681167, lng:139.767052};
        
        
        map = new google.maps.Map(target, {
          center: tokyo,
          zoom:15,
          disableDefaultUI: true,
          zooomControl : true,
          mapTypeId: 'hybrid',
          
          });
          
        
      }
    </script>
    </body>
    </html>