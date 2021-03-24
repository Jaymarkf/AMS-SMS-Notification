<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .link:hover{
            color:#6ab6fc !important;
        }
        html,body{
            height:100%;
            width:100%;
            background-color:#183241;
            overflow:hidden !important;
           
        }
        .vertical-center {
        min-height: 100%;  
        min-height: 90vh;
      
        display: flex;
        align-items: center;
        }
    </style>
</head>
<body>
@include('nav')
<div class="vertical-center">
  <div class="container">
  <img src="{{url('/images/vroom.jpeg')}}" width="250"class="rounded mx-auto d-block" alt="...">
  </div>
</div>
@include('footer')
</body>
</html>
