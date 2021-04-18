<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <link rel="icon" href="#" type="image/x-icon"/>
    <title>Vroom</title>
    @include('admin/css/navstyle')
    @include('admin/css/misc')
</head>
<body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<div id="app">
    <div class="content">
        @include('admin/header')
            <div class="wrapper d-flex">
                @include('admin/sidebar')
                <!-- content of a specific page -->  
                            @if(Request::is('admin/student'))
                                @include('admin/student')
                            @elseif(Request::is('admin/settings'))
                                <!-- year_data to show select option all data in settings -->
                            
                                <settingsyear :year_data="{{ $year_level }}">
                                </settingsyear>
                            @elseif(Request::is('admin/sms'))
                                @include('admin/sms')
                            @endif 
    </div>
 
</div>
<div id="loading"></div>  
</body>
<html>

