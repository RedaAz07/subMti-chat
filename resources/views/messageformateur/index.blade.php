@foreach ($messageformateurs as $messageformateur)
{{$messageformateurs->contenu}}


@endforeach



hkbjélnm

<form action="{{route("messageformateur.store")}}" method="post">@csrf

    <input type="text"   name="contenu">
    <input type="file"   name="file">
    <button type="submit"> send </button>

    </form>
