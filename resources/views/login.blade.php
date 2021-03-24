<!doctype html>
<html>
<head>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Vroom</title>
    <style>
        html,body{
            height:100%;
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
    <div class="container mb-5">
        <div class="card" style="width: 400px;margin:0px auto;background-color:#2c5c61">
        <div class="card-header text-white" style="background-color:#183241;font-size:21px;line-height:24px;"><img src="{{ url('/images/vroom.jpeg')}}" width="60"/> &nbsp;&nbsp;Admin gatepass login</div>
        <div class="card-body">
        @if(Session::get('fail'))
            <div class="alert alert-danger text-center msg-c"><span class="text-danger font-weight-bold text-center msg">{{ Session::get('fail') }}</span></div>
        @endif

        @if(Session::get('no_user'))
        <div class="alert alert-danger text-center msg-c"><span class="text-danger font-weight-bold text-center msg">{{ Session::get('no_user') }}</span></div>
        @endif
        <form action="{{ route('auth') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="user" class="text-white">Username</label>
                <input type="text" class="form-control" name="username" id="user" aria-describedby="usernameHelp" placeholder="Enter username" value="{{ old('username') }}">
                <span class="text-danger">@error('username'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="text-white">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{ old('password') }}">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>

    </div>
</div>
@include('footer')
</body>
</html>