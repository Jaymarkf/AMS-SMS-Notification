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
            <div class="main-content" style="width:calc(100% - 230px);margin-left:230px;min-height:100%;max-height:100%;">
                <div class="container-fluid p-4">
                <!-- content of a url -->
                    <div  id="app" class="p-5">
                        <student></student>
                        
                        <!-- render to view -->

                    </div>
                </div>
            </div>
        </div>
</div>
</body>

<script>
$(document).ready(function(){
$('#p-minimizer').click(function(){
   if($('#minimizer').hasClass('fa-toggle-on')){
       $('#minimizer').addClass('fa-toggle-off');
       $('#minimizer').removeClass('fa-toggle-on');
       $('#sidebar').css('margin-left','-190px');
       $('.main-content').css({'width':'100%','margin-left':'40px'});
       $('.sidebar_icon').css({'margin-left':'182px','margin-top':'40px'});
   }else{
    $('#minimizer').addClass('fa-toggle-on');
       $('#minimizer').removeClass('fa-toggle-off');    
       $('#sidebar').css('margin-left','0px');
       $('.main-content').css({'width':'calc(100% - 230px)','margin-left':'230px'});
       $('.sidebar_icon').css('margin','0');
   }
});
});
</script>
<html>
