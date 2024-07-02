<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\etudient;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EtudientController extends Controller
{









    public function create()
    {





       return view("etudient.create",[

        "filieres"=>filiere::all(),
        "niveaux"=>niveau::all(),
        "classes"=>classe::all(),

       ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {




      $utilisateur = new utilisateur();
      $utilisateur->email = $request->input("prenom").$request->input("nom")."@supMti.com";
      $utilisateurEmail=$utilisateur->email;
      $utilisateur->password = Hash::make($request->input("nom").$request->input("CIN"). rand(1, 10));
      $utilisateurPass=$utilisateur->password;
      $utilisateur->type = "etudeint";
      $utilisateur->newPassword = "";
      $utilisateur->save();




// Read the existing JSON data from the file
$jsonData = file_get_contents('Acc_etudients.json');

// Decode the JSON data into a PHP associative array
$existingData = json_decode($jsonData, true);

// Define new values to be added
$newValues = [
    'email' => $utilisateurEmail,
    'password' => $utilisateurPass,
    'nom' => $request->input("nom"),
    'prenom' => $request->input("prenom"),
    'prenom' => $request->input("CIN")


    //
];

// Merge the existing data with the new values
$mergedData = array_merge($existingData, $newValues);

// Convert the merged data back to JSON format
$newJsonData = json_encode($mergedData, JSON_PRETTY_PRINT);

// Write the new JSON data back to the file
file_put_contents('Acc_etudients.json', $newJsonData);





$niveau = new niveau();
$niveau->niveau = $request->input("niveau");
$niveau->id_filiere = $request->input("filiere");
$niveau->save();



$niveau = new niveau();
$niveau->niveau = $request->input("niveau");
$niveau->id_filiere = $request->input("filiere");
$niveau->save();





      $etudient = new etudient();

      $etudient->nom = $request->input("nom");
      $etudient->prenom = $request->input("prenom");
      $etudient->CIN = $request->input("CIN");
      $etudient->dateNaissance = $request->input("dateNaissance");
      $etudient->telephone = $request->input("telephone");
      $etudient->addresse = $request->input("addresse");
      $etudient->id = $utilisateur['id']; // Assign the etudient id

      // Assign the id_classe (group) based on the current group index
      $etudient->id_classe =  $request->input("classe");


      $etudient->save();








    }

    /**
     * Display the specified resource.
     */



















    public function show(etudient $etudient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(etudient $etudient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, etudient $etudient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(etudient $etudient)
    {
        $etudient->delete();
        return back();
    }

}
