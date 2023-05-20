<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <title>Admin Login</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet">
    <!--fontawesome-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- <link rel="stylesheet" href="assets/css/main-style.css"> -->
    <link rel="stylesheet" href="{{url('../assets/css/main-style.css')}}" />
    <style>
        
    </style>
</head>

<body>

    <div class="admin-login__wrapper admin-login">
        <div class="admin-login__content">
          <div class="admin-login__main-content container-fluid">
            <div class="admin-login__container">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header bg-transparent border-bottom-0">
                    <img class="logo-img" src="assets/images/mobilecoderz-logo.svg" alt="logo" width="102" height="27">
                    </div>
                <div class="card-body">


                    @if ($message = Session::get('error'))
                   <div class="alert alert-danger alert-block">
                       <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ $message }}</strong>
                   </div>
                   @endif

                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                      <ul>
                              @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                     </div>
            @endif
                  <form method="post" action="{{ url('/checklogin') }}">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <input class="form-control" id="email" type="email"name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="password" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group row login-tools">
                      <div class="col-6 login-remember">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="checkbox1">
                          <label class="custom-control-label" for="checkbox1">Remember Me</label>
                        </div>
                      </div>
                      <div class="col-6 text-right">
                          <!-- <a href="{{url('admin/forgotpassword')}}">Forgot Password?</a> -->
                        </div>
                    </div>
                    <div class="form-group">
                       <input type="submit" name="login" class="btn btn-success btn-xl w-100 py-1" value="Sign in" />
                    </div>
                    <!-- <div class="form-group login-submit">
                        <a class="btn btn-success btn-xl w-100 py-1" value="Login" name="login" data-dismiss="modal">Sign me in</a></div> -->
                  </form>
                </div>
              </div>
              <div class="admin-login__footer text-center font-15">
                  <!-- <span>Don't have an account? <a href="{{url('/signup')}}">Sign Up</a></span></div> -->
            </div>
          </div>
        </div>
      </div>
 
    <script src="{{url('../assets/js/jquery-3.0.0.min.js')}}"></script>
	  <script src="{{url('../assets/js/popper.min.js')}}"></script>
    <script src="{{url('../assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('../assets/js/custome-script.js')}}"></script>
    
</body>

</html>