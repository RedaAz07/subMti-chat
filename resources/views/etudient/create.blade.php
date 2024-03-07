

<form action="{{ route("etudient.store") }}" method="POST">
    @csrf

    <!-- Filiere select box -->
    <label for="filiere">Filiere:</label>
    <select name="filiere" id="filiereSelect">
        @foreach ($filieres as $filiere)
            <option value="{{ $filiere->id_filiere }}">{{ $filiere->nom_filiere }}</option>
        @endforeach
    </select>

    <!-- Niveaux select box (initially empty) -->
    <label for="niveaux">Niveaux:</label>
    <select name="niveaux" id="niveauxSelect">
        <!-- Options will be dynamically populated based on the selected filiere -->
    </select>

    <!-- Classe select box (initially empty) -->
    <label for="classe">Classe:</label>
    <select name="classe" id="classeSelect">
        <!-- Options will be dynamically populated based on the selected niveau -->
    </select>







    nom <input type="text" name="nom">
    prenom <input type="text" name="prenom">
    addresse <input type="text" name="addresse">
    telephone <input type="text" name="telephone">
    CIN <input type="text" name="CIN">
    dateNaissance <input type="text" name="dateNaissance">






    <button type="submit">Submit</button>
</form>

<script>
    // Function to populate the Niveaux select box based on the selected Filiere
    document.getElementById('filiereSelect').addEventListener('change', function() {
        var filiereId = this.value;
        var niveauxSelect = document.getElementById('niveauxSelect');
        niveauxSelect.innerHTML = ''; // Clear previous options

        // Fetch Niveaux data based on the selected Filiere using AJAX or Livewire

        // Example AJAX code:
        // fetch('/get-niveaux/' + filiereId)
        //     .then(response => response.json())
        //     .then(data => {
        //         data.forEach(niveau => {
        //             var option = document.createElement('option');
        //             option.value = niveau.id_niveau;
        //             option.textContent = niveau.niveau;
        //             niveauxSelect.appendChild(option);
        //         });
        //     });

        // For this example, I'll assume you have a JavaScript variable containing Niveaux data
        var niveauxData = {!! json_encode($niveauxData) !!};

        niveauxData.forEach(niveau => {
            if (niveau.filiere_id == filiereId) {
                var option = document.createElement('option');
                option.value = niveau.id_niveau;
                option.textContent = niveau.niveau;
                niveauxSelect.appendChild(option);
            }
        });
    });

    // Function to populate the Classe select box based on the selected Niveau
    document.getElementById('niveauxSelect').addEventListener('change', function() {
        var niveauId = this.value;
        var classeSelect = document.getElementById('classeSelect');
        classeSelect.innerHTML = ''; // Clear previous options

        // Fetch Classe data based on the selected Niveau using AJAX or Livewire

        // Example AJAX code:
        // fetch('/get-classes/' + niveauId)
        //     .then(response => response.json())
        //     .then(data => {
        //         data.forEach(classe => {
        //             var option = document.createElement('option');
        //             option.value = classe.id_classe;
        //             option.textContent = classe.num_groupe;
        //             classeSelect.appendChild(option);
        //         });
        //     });

        // For this example, I'll assume you have a JavaScript variable containing Classe data
        var classesData = {!! json_encode($classesData) !!};

        classesData.forEach(classe => {
            if (classe.niveau_id == niveauId) {
                var option = document.createElement('option');
                option.value = classe.id_classe;
                option.textContent = classe.num_groupe;
                classeSelect.appendChild(option);
            }
        });
    });
</script>




