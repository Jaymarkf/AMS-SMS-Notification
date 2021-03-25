<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="#" type="image/x-icon"/>
    <title>Vroom</title>
    @include('admin/navstyle')
</head>
<body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<div class="content">
    @include('admin/header')
        <div class="wrapper d-flex">
            @include('admin/sidebar')
              <!-- content of a specific page -->
                    @if(Route::get('admin/student'))
                        @include('admin/student');
                    @endif
        
        </div>
</div>
</body>
<html>
