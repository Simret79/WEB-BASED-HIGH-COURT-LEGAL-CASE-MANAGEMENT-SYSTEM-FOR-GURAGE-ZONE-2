<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $image_logo->company_name ?? '' }} | Password Reset </title>
    @if($image_logo->favicon_img!='')
    <link rel="shortcut icon" href="{{asset(config('constants.FAVICON_FOLDER_PATH') .'/'. $image_logo->favicon_img)}}" >
    @endif

    <!-- Bootstrap -->
    <link href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('assets/admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
       <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
             <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/password/email') }}">
                        {{ csrf_field() }}
                 @if($image_logo->logo_img!='')
                <img src="{{asset(config('constants.LOGO_FOLDER_PATH') .'/'. $image_logo->logo_img)}}" style="width: 308px;">
                @else
                <img src="{{ asset('public/upload/logo.png') }}" style="margin-bottom: 20px;">
                @endif
              <h2> Reset Your Account </h2>
               <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                                 @if ($errors->has('email'))
                                    <span class="help-block text-left">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
              </div>
         
              <div>
                     <button type="submit" class="btn btn-default">
                                   Send Password Reset Link
                                </button>
               
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
  </body>
</html>