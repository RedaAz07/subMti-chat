


<ul>
    @foreach($messageEtudient as $message)
        <li>
            {{$message->contenu}}
            <img src="{{ asset('storage/' . $message->file) }}" alt="" width="300px">

        </li>
    @endforeach
</ul>

<form method="post" action="{{ route('adminEtudMessages.storeAdmin') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_admin" value="{{$id_admin}}">


    <textarea name="contenu" placeholder=""></textarea>
    <input type="file" value="" name="file">
    <button type="submit">okii </button>
</form>

