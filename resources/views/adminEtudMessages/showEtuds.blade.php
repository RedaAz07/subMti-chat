


<ul>
    @foreach($messages as $message)
        <li>
            {{$message->contenu}}
            <img src="{{ asset('storage/' . $message->file) }}" alt="" width="300px">

        </li>
    @endforeach
</ul>

<form method="post" action="{{ route('adminEtudMessages/admin.store') }}"   enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id_etudient" value="{{$id_etud}}">


    <textarea name="contenu" placeholder=""></textarea>
    <input type="file" value="" name="file">
    <button type="submit">okii </button>
</form>

