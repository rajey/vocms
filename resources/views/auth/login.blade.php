<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!--Fonts-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">

    <!--styles-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
  </head>
  <body style="background: #BFAFA8;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <img src="{{asset('images/new-truck.png')}}" alt="" height="200"/>
                <h2><strong>Login</strong></h2>
              </div>
              <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Enter email address">
                          @if ($errors->has('email'))
                              <span class="help-block text-center">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="form-control input-lg" name="password" placeholder="Enter password">
                          @if ($errors->has('password'))
                              <span class="help-block text-center">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>

                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="remember">&nbsp;Remember Me
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                          <i class="fa fa-btn fa-sign-in"></i>&nbsp;Login
                        </button>
                      </div>
                  </form>
                </div>
              </div>
              <div class="text-center">
                <a class="btn btn-link text-primary" href="{{ url('/password/reset') }}">
                  <strong>Forgot Your Password?</strong>
                </a>
              </div>
            </div>
        </div>
    </div>
  </body>
</html>
