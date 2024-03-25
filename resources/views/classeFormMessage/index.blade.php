


<ul>
    @foreach($messages as $message)
        <li>
            {{$message->contenu}}

        </li>
    @endforeach
</ul>

<form method="post" action="{{ route("classeFormMessage.store") }}">
    @csrf
    <input type="hidden" name="id_classe" value="{{$id_classe}}">
    <textarea name="contenu" placeholder=""></textarea>
    <input type="text" value="" name="file">
    <button type="submit">okii </button>
</form>

