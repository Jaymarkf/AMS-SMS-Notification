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
                <div class="d-flex justify-content-center align-items-center">
                <img class="card-img-top" src="{{asset('images/max_usage.png')}}" style="width:70%;height:70%;position:relative; " alt="Card image cap">
                </div>
                <div class="card-body">
                <h5 class="card-title alert alert-warning text-center">Max API Request! Error code 182</h5>
                <p class="card-text">Request was exceed approximately or greater than <b class="text-danger">4000</b> URL API Design request of services per day. In order to remove the limit, Please purchased the unlimited <b class="text-success">Max API Request</b> > <i class="text-primary">$5.72 to $14.82 / month.</i></p>
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