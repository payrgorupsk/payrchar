<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160446042-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-160446042-1');
    </script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('public/uploads/website-assets/favicon.png') }}">
    <link rel="stylesheet" href="{!! asset('public/LoginAssets/style.css') !!}" />
    <title>Business social network</title>
    <meta name="description" content="Payrchat is one of the Rising new social media sites in Bangladesh. Payrchat is the top social networking sites with user registration, Login and with awesome features." />
    <meta name="keywords" content="new social media sites, top social networking site, Business social network, Online shoping, Best Bangladesh Shoping, Bangladesh e-commerce website">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="facebook-domain-verification" content="9aaqx5rvgtudrl03jp35vob5s8te74" />
    <meta name="google-site-verification" content="gpR7usA-i-mbjATmnKh3mWNk0gdATcplOnJL0ZILspQ" />
    <meta name="facebook-domain-verification" content="izd4unkn3vw1j5h6oorj9xa2o498gx" />
      <!-- og tags -->
    <meta property="og:title" content="Business social network" />
    <meta property="og:url" content="https://www.payrchat.com" />
    <meta property="og:description" content="Payrchat is one of the Rising new social media sites in Bangladesh. Payrchat is the top social networking sites with user registration, Login and with awesome features." />
    <meta property="og:image" content="https://www.payrchat.com/logo.png" />
  </head>
  <body>
    <div class="container {{ isset($signUpClass) ? $signUpClass : '' }}">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{ route('login') }}" method="post" class="sign-in-form">
            @csrf
            <h2 class="title">Sign in</h2>
            <small>Use phone number or email to login</small>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="email" value="{{ old('email') }}" placeholder="E-Mail or phone" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" required placeholder="Password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <a href="{{ route('password.request') }}" class="social-text" style="text-decoration: none;color: inherit;">Forget password?</a>
            <div class="social-media">
            </div>
          </form>
          <form action="{{ route('register') }}" method="post" class="sign-up-form">
            @csrf
            <h2 class="title">Sign up</h2>
            <small style="color:red">{{ isset($emptyPhoneAndEmail) ? $emptyPhoneAndEmail : '' }}</small>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}"/>
              <input type="hidden" class="input" name="refered_by" value="<?php echo (empty($_GET['refer_id'] )) ? ' ' : $_GET['refer_id']  ?>">
            </div>
            @if($errors->has('first_name'))
              <small style="color:red">{{ $errors->first('first_name') }}</small>
            @endif
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}"/>
            </div>
            @if($errors->has('last_name'))
              <small style="color:red">{{ $errors->first('last_name') }}</small>
            @endif
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="E-Mail"  value="{{ old('email') }}"/>
            </div>
            @if($errors->has('email'))
              <small style="color:red">{{ $errors->first('email') }}</small>
            @endif
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" name="phone" placeholder="Phone"  value="{{ old('phone') }}"/>
            </div>
            @if($errors->has('phone'))
              <small style="color:red">{{ $errors->first('phone') }}</small>
            @endif
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  name="password" placeholder="Password" />
            </div>
            @if($errors->has('password'))
              <small style="color:red">{{ $errors->first('password') }}</small>
            @endif
            <input type="submit" class="btn" value="Sign up" />

          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>

            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="{!! asset('public/LoginAssets/img/log.svg')!!}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="{!! asset('public/LoginAssets/img/register.svg') !!}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{!! asset('public/LoginAssets/app.js') !!}"></script>
  </body>
</html>
