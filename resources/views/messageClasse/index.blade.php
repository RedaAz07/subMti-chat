

@auth


@foreach ($etudients as $etudient)

@if ($etudient->id_etudient ===  auth()->user()->id)



@foreach ($messageClasses as $messageClasse)
@if ($etudient->classe->id_classe === $messageClasse->id)

 {{$messageClasse->contenu}}

 @endif
 @endforeach
 @endif

 @endforeach









@endauth





<form action="{{ route('messageClasse.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="contenu">
    <input type="file" name="file">



    <button type="submit">send</button>
</form>




