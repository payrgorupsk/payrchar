<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-160446042-1"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-160446042-1');
   </script>
   <meta name="description" content="Payrchat is one of the Rising new social media sites in Bangladesh. Payrchat is the top social networking sites with user registration, Login and with awesome features." />
   <meta name="keywords" content="new social media sites, top social networking sites, Business social network, Online shoping, Best Bangladesh Shoping, Bangladesh e-commerce website, Bangladesh social media">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="facebook-domain-verification" content="9aaqx5rvgtudrl03jp35vob5s8te74" />
   <meta name="google-site-verification" content="gpR7usA-i-mbjATmnKh3mWNk0gdATcplOnJL0ZILspQ" />
   <meta name="facebook-domain-verification" content="izd4unkn3vw1j5h6oorj9xa2o498gx" />
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>Business social network</title>
   <!-- CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/night-mode.css') }}">
   <link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/framework.css') }}">
   <!-- icons -->
   <link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/icons.css') }}">
   <!-- Google font -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{ asset('public/holaTheme/assets/css/custom.css') }}">
   <link rel="shortcut icon" type="image/jpg" href="{{ asset('public/uploads/website-assets/favicon.png') }}">
   <!-- og tags -->
   <meta property="og:title" content="Business social network" />
   <meta property="og:url" content="https://www.payrchat.com" />
   <meta property="og:description" content="Payrchat is one of the Rising new social media sites in Bangladesh. Payrchat is the top social networking sites with user registration, Login and with awesome features." />
   <meta property="og:image" content="https://www.payrchat.com/logo.png" />
   @yield('custom_css')

</head>

<body>

   <div id="wrapper">
      @include('includes.left-sidebar')

      @include('includes.navbar')

      @yield('content')

   </div>

   <!-- Wrapper END -->
   <script src="{{ asset('public/holaTheme/assets/js/framework.js') }}"></script>
   <script src="{{ asset('public/holaTheme/assets/js/jquery-3.3.1.min.js') }}"></script>
   <script src="{{ asset('public/holaTheme/assets/js/simplebar.js') }}"></script>
   <script src="{{ asset('public/holaTheme/assets/js/main.js') }}"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script src="{{ asset('public/holaTheme/assets/js/custom.js') }}"></script>
    <!-- tinyMC  -->
    <script src="{{ asset('public/holaTheme/plugin/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/holaTheme/plugin/tinymce/init-tinymce.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   @yield('custom_js')
</body>

</html>