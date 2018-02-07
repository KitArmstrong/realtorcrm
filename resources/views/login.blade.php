<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Realtor CRM</title>

        <!-- Bootstrap CSS-->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
        <!-- Google fonts - Poppins -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
        <!-- Main stylesheet-->
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    </head>

    <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Company Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Realtor CRM</h1>
                  </div>
                  <p>Your tool for real estate success!</p>
                </div>
              </div>
            </div>
            <!-- Login Form Panel -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" action="{{ route('login') }}" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group">
                      <input id="username" type="text" name="username" value="{{ old('username') }}" required class="input-material">
                      <label for="username" class="label-material">User Name</label>
                      @if ($errors->has('username'))
                        <label class="error" for="password">
                          {{ $errors->first('username') }}
                        </label>
                      @endif
                    </div>

                    <div class="form-group">
                      <input id="password" type="password" name="password" required class="input-material">
                      <label for="password" class="label-material">Password</label>
                      @if ($errors->has('password'))
                        <label class="error" for="password">
                          {{ $errors->first('password') }}
                        </label>
                      @endif
                    </div>
                    @if (session('loginerror'))
                      <div class="login-error">
                        {{ session('loginerror') }}
                      </div>
                    @endif
                    <button type="submit" id="login" class="btn btn-primary">Login</button>
                  </form><a href="#" class="forgot-pass">Forgot Password?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{asset('vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/jqueryvalidate/jquery.validate.min.js')}}"></script>

    <!-- Main File-->
    <script src="{{asset('js/login.js')}}"></script>
    </body>
</html>
