<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Login Page | theuicode.com</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
</head>

<body>
    <div class="container">
        <div class="design">
            <img src="{{ asset('img/login.png') }}" alt="Example Image">

        </div>

        <div class="login">
            <form action="{{route("login.login")}}" method="post" id="form">@csrf
            <h3 class="title">User Login</h3>
            <div class="text-input">
                <i class="ri-user-fill"></i>
                <input type="text" placeholder="Username" name="email">
            </div>

                                <span class="error">@error('email')
                                    {{$message}}@enderror</span>
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" placeholder="Password" name="password">

            </div>
            <span class="error">@error('password')
                {{$message}}@enderror</span>
            <button class="login-btn" type="submit">LOGIN</button>

            <span class="error">@error('login')
                {{$message}}@enderror</span>
        </form>
            <a href="#" class="forgot">Forgot Username/Password?</a>

        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
