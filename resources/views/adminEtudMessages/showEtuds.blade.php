


<ul>
    @foreach($messages as $message)
        <li>
            {{$message->contenu}}

        </li>
    @endforeach
</ul>

<form method="post" action="{{ route('adminEtudMessages.store') }}">
    @csrf
    <input type="hidden" name="id_etudient" value="{{$id_etud}}">


    <textarea name="contenu" placeholder=""></textarea>
    <input type="text" value="" name="file">
    <button type="submit">okii </button>
</form>

