
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $image_logo->company_name ?? '' }} | Login </title>
    @if($image_logo->favicon_img!='')
    <link rel="shortcut icon" href="{{URL::asset(config('constants.FAVICON_FOLDER_PATH') .'/'. $image_logo->favicon_img)}}" >
    @endif
    <!-- Bootstrap -->
    <link href="{{URL::asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{URL::asset('assets/admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{URL::asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
       <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        .login_content_btn a:hover{
            text-decoration: none;
        }
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
             <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}

                @if($image_logo->logo_img!='')
                <img src="{{asset(config('constants.LOGO_FOLDER_PATH') .'/'. $image_logo->logo_img)}}" style="margin-bottom: 20px;">
                @else
                <img src="{{ asset('public/upload/logo.png') }}" style="margin-bottom: 20px;">
                @endif
              <h2> Login Here </h2>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                   <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block text-left">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                 <input id="password" type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block text-left">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div>
                     <button type="submit" class="btn btn-default">
                                    Login
                                </button>
                <a class="reset_pass"  href="{{ url('/admin/password/reset') }}">Forget your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
      
                  <p>©2023 All Rights Reserved. IS students</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="{{asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $(".fill-login").click(function () {
                $("#email").val($(this).data("email"));
                $("#password").val($(this).data("password"));
            });

        });
    </script>
  </body>
</html>

