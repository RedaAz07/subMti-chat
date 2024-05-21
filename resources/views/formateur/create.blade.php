
<div class="container">
    <h2>Create Formateur</h2>
    <form action="{{ route('formateur.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">nom:</label>
            <input type="text" class="form-control" id="name" name="nom" required>
        </div>



        <div class="form-group">
            <label for="name">prenom:</label>
            <input type="text" class="form-control" id="name" name="prenom" required>
        </div>



        <div class="form-group">
            <label for="name">telephone:</label>
            <input type="text" class="form-control" id="name" name="telephone" required>
        </div>


        <div class="form-group">
            <label for="name">CIN:</label>
            <input type="text" class="form-control" id="name" name="CIN" required>
        </div>




        <div class="form-group">
            <label for="name">addresse :</label>
            <input type="text" class="form-control" id="name" name="addresse" required>
        </div>




        <div class="form-group">
            <label for="name">date de naissance  :</label>
            <input type="date" class="form-control" id="name" name="dateNaissance" required>
        </div>










        <div class="form-group">
            <label for="classes">Classes:</label>
            <select multiple class="form-control" id="classes" name="classes[]" required
                @foreach($classes as $classe)


<option value="{{ $classe->id_classe }}"> {{ $classe->num_groupe }} - Niveau: {{ $classe->niveau->niveau }} -

@foreach ($filieres as $item)
@if ($item->id_filiere === $classe->niveau->id_filiere  )

Filiere:{{$item->nom_filiere }}
@endif
@endforeach

                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

