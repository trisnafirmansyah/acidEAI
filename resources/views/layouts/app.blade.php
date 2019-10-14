<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Astrid EAI</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.2.4/firebase-auth.js"></script>
<!-- firebaseUI -->
<script src="https://cdn.firebase.com/libs/firebaseui/4.0.0/firebaseui.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload="checkSignIn()">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Astrid EAI
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <span id="dropdownUser" class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#" id="logout_btn">
                                        Logout
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>



 // Your web app's Firebase configuration
 var firebaseConfig = {
        apiKey: "AIzaSyCNu7ZOlpTTe87TY0B0g2uR2hm5-ludDVQ",
        authDomain: "acid-eai.firebaseapp.com",
        databaseURL: "https://acid-eai.firebaseio.com",
        projectId: "acid-eai",
        storageBucket: "acid-eai.appspot.com",
        messagingSenderId: "805250270249",
        appId: "1:805250270249:web:87926391f915f6d04e8838",
        measurementId: "G-CSQT1GNPQX"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);

function signOut() {
    firebase.auth().signOut().then(function() {
        window.location="/";
        }).catch(function(error) {
        // An error happened.
        });
};

function checkSignIn() {
      firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
          user.providerData.forEach(function (profile) {
            console.log("Sign-in provider: " + profile.providerId);
            console.log("  Provider-specific UID: " + profile.uid);
            console.log("  Name: " + profile.displayName);
            console.log("  Email: " + profile.email);
            console.log("  Photo URL: " + profile.photoURL);
            var providerIcon;
            switch (profile.providerId) {
              case "google.com" :
                providerIcon = '<i class="fa fa-google" aria-hidden="true"></i> ';
                break;
              case "facebook.com" :
                providerIcon = '<i class="fa fa-facebook-official" aria-hidden="true"></i> ';
                break;
              default:
                providerIcon = '<i class="fa fa-github" aria-hidden="true"></i> ';
                break;
            }

            var username = (profile.displayName) ? profile.displayName : profile.email;
            document.getElementById("dropdownUser").innerHTML= providerIcon+username;
          });
        } else {
          window.location = "/";
        }
      });
    }


</script>
</html>
