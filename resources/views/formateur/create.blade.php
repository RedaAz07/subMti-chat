
<div class="container">
    <h2>Create Formateur</h2>
    <form action="{{ route('formateur.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="classes">Classes:</label>
            <select multiple class="form-control" id="classes" name="classes[]" required
                @foreach($classes as $classe)


@foreach ($classe->niveau as $item)


@if ($classe->niveau->filiere->id_filiere ===$item->id_filiere )
<option value="{{ $classe->id_classe }}"> {{ $classe->num_groupe }} - Niveau: {{ $classe->niveau->niveau }} - Filiere:{{$item->id_filiere }}
@endif

@endforeach
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

