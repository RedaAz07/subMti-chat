


<ul>
    @foreach($messages as $message)
        <li>
            {{$message->contenu}}

        </li>
    @endforeach
</ul>

<form method="post" action="{{ route('adminProfMessages.store') }}">
    @csrf
    <input type="hidden" name="id_formateur" value="{{$id_form}}">


    <textarea name="contenu" placeholder=""></textarea>
    <input type="text" value="" name="file">
    <button type="submit">okii </button>
</form>

