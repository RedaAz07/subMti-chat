
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta http-equiv="refresh" content="60">

</head>
<body>

    <form action="{{route("login.logout")}}" method="post">@csrf

        <button type="submit">log out</button>

        </form>


    <ul>

    @foreach ($messages as $message)

    <li>

      
       <h1> {{$message->contenu}}</h1>
       <img
       src="{{asset("storage/".$message->file)}}"  alt=""   width="50px">

    </li>
    @endforeach
    </ul>
    {{$id_utilisateur = session('id_utilisateur');


    }}

    <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="contenu">
        <input type="file" name="file">



        <button type="submit">send</button>
    </form>


    <div style="background-color: red">







    @foreach ($utilisateurs as $utilisateur)




    @if ($id_utilisateur===$utilisateur->id_utilisateur)

    @endif

    @endforeach





    </div>


</body>
</html>
