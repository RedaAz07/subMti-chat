<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($actualites as $actualite)
    <h2>{{$actualite->contenu}}</h2>
    @endforeach


    <form action="{{ route("actualites.store") }}"  method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="envoyer une actualite" name="contenu">
        <input type="file" name="file" id="">
        <button type="submit">send</button>
    </form>
</body>
</html>
