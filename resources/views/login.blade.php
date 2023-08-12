<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style-login.css')}}">
</head>
<body>
    <body id="bg-login">
        <div class="kotak_bg">
            <h2 align="center">SISTEM INFORMASI <br> AKADEMIK</h2>
            <center>
                <img src="{{asset('assets/img/logo.png')}}" class="circle" width="150px" height="150px" alt="">
            </center>
            <center>
                <font size="5" color="red""><b>STMIK</b> Mardira Indonesia</font>
            </center>
        </div>
        <div class=" kotak_login">
                    <p>Please login to start your session</p>
                    @if (Session::has('statusLog'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('messageLog')}}
                    </div>
                    @elseif (Session::has('statusOut'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('messageOut')}}
                    </div>
                @endif
                    <form method="POST" action="">
                        @csrf
                        <input type="email" name="email" class="form_login" placeholder="Masukkan Email" required>
                        <input type="password" id="TeguhInput" name="password" class="form_login" placeholder="Masukkan Password" required>
                        <input type="checkbox" onclick="liatPw()">See Password
                        <input type="submit" class="tombol_login" name="submit" value="LOGIN">
                    </form>
        </div>
        <script>
            function liatPw() {
                var x = document.getElementById("TeguhInput");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
            }
        </script> 
</body>
</html>