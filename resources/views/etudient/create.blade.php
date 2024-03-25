

<form action="{{ route("etudient.store") }}" method="POST">
    @csrf


    <label for="filiere">Filiere:</label>
    <select name="filiere" id="filiereSelect">
        @foreach ($filieres as $filiere)
            <option value="{{ $filiere->id_filiere }}">{{ $filiere->nom_filiere }}</option>
        @endforeach
    </select>


    <label for="niveaux">Niveaux:</label>
    <select name="niveaux" id="niveauxSelect">


        <option value="1er annee "> 1er annee</option>
        <option value="2eme annee "> 2eme annee </option>
<option value="3eme annee "> 3eme annee  </option>
<option value="4eme annee "> 4eme annee   </option>
<option value="4^5eme annee "> 5eme annee
    </select></option>


    <!-- Classe select box (initially empty) -->
    <label for="classe">Classe:</label>
    <select name="classe" id="classeSelect">
<option value="A">a</option>
<option value="B">B</option>

   </select>








    nom <input type="text" name="nom">
    prenom <input type="text" name="prenom">
    addresse <input type="text" name="addresse">
    telephone <input type="text" name="telephone">
    CIN <input type="text" name="CIN">
    dateNaissance <input type="text" name="dateNaissance">






    <button type="submit">Submit</button>
</form>



