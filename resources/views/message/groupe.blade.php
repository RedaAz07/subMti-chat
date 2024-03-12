{{auth()->user()->id}}
{{$groupId}}



@foreach ($etudients as $etudient)
@auth
    @if ($etudient->id_etudient === auth()->user()->id)
@if ($etudient->classe->id_classe === $groupId)







@endif




    @endif
@endauth
@endforeach
