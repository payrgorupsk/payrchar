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
   <!-- For Night mode -->
   <script>
   (function (window, document, undefined) {
         'use strict';
         if (!('localStorage' in window)) return;
         var nightMode = localStorage.getItem('gmtNightMode');
         if (nightMode) {
            document.documentElement.className += ' night-mode';
         }
   })(window, document);
   (function (window, document, undefined) {

         'use strict';

         // Feature test
         if (!('localStorage' in window)) return;

         // Get our newly insert toggle
         var nightMode = document.querySelector('#night-mode');
         if (!nightMode) return;

         // When clicked, toggle night mode on or off
         nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('night-mode');
            if (document.documentElement.classList.contains('night-mode')) {
               localStorage.setItem('gmtNightMode', true);
               return;
            }
            localStorage.removeItem('gmtNightMode');
         }, false);

   })(window, document);
   </script>
   <script type="application/javascript" src="{{ asset('public/js/app.js') }}"></script>
   <script type="application/javascript">
      var ENDPOINT = "{{ url('/') }}";

      const app = new Vue({
         el: '#wrapper',
         data: {
               user: {!! Auth::check() ? Auth::user()->toJson() : 'null' !!},
               friendRequest: {}
         },
         mounted() {
               this.getFriendRequests();
               this.listen();
         },
         methods: {
               getFriendRequests() {
                  axios.get(ENDPOINT + `/friend-requests`)
                  .then((response) => {
                     this.friendRequest = response.data.data;
                  })
                  .catch(function (error) {
                     console.log(error);
                  })
               },
               postFriendRequest(id) {
                  let csrftoken = "{!! csrf_token() !!}";
                  let headers = {
                     "X-CSRFToken": csrftoken,
                     "Content-Type": "application/x-www-form-urlencoded"
                  };
                  let path = ENDPOINT+`/friend-add/`+id.path[0].id.substr(12)
                  let userId = id.path[0].id.substr(12)
                  axios.post(path, userId, headers)
                  .then((response) => {
                     console.log(response)
                  })
                  .catch(function (error) {
                     console.log(error);
                  });
               },
               listen() {
                  Echo.channel('friendRequest')
                        .listen('Friendrequest', (response) => {
                           this.friendRequest.push(resonse.data);
                           this.getFriendRequests();
                        });
               }
         }
      });
   </script>
   @yield('custom_js')
</body>

</html>