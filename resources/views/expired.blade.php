<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .card-container{
        position:absolute;
        left:0;
        top:0;
        width:100%;
        height:100%;
        background-color:transparent;
        display:flex;
        justify-content:center;
        align-items:center;
  
    }
    .card-group{
        width: 30%;
        height: 30%;
        margin-right: 40vw;
        margin-bottom:20vw;
        
    }
    body, html {
    height: 100%;
    margin: 0;
    position:relative;
    width:100%;
    }

.bg {
  /* The image used */
  background-image: url("../images/expired.jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
    </style>
    <title>API DESIGN EXPIRED!</title>
  </head>
  <body>
    <div class="bg"></div>
    <div class="card-container">
        <div class="card-group">
            <div class="card">
                <img class="card-img-top" src="{{asset('images/guard.jpg')}}" width="120" height="400" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title alert alert-danger text-center">Trial Expired! Error code 192</h5>
                <p class="card-text">Please subscribe to the standard bundles at  <small class="text-success"><i>$29.95/month</i> </small> or you may contact system administrator to re-configure the bundles and get % of discount up to %20.</p>
                <p class="card-text"><small class="text-muted">Copyright &copy; 2003 - 2021 | API BC Design | All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>