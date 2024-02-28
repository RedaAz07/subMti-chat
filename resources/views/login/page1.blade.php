<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
</head>
<body>
    <span id="header">
        <div class="title">SUP<B>MTI</B></div>
        <div class="button-container">
            <button id="dark-mode-toggle">Activer le mode sombre</button>

        </div>

<div>
    <form action="{{route("login.logout")}}" method="post">@csrf

        <button type="submit">khrj</button>

        </form>
    </div>
        <script src="{{asset("js/app.js")}}"></script>


</body>
</html>
