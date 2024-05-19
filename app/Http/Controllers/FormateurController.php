<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\message;
use App\Models\etudient;
use App\Models\actualite;
use App\Models\formateur;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class FormateurController extends Controller
{











    public function exportDataformateur()
    {

        // Retrieve data from the JSON file
        $jsonData = file_get_contents(public_path('data_formateurs.json'));
        $formateursData = json_decode($jsonData, true);

        // Process data
        $groupCount = 10; // Number of groups
        $groupIndex = 0; // Counter to keep track of the current group index
        $userCount = 0; // Counter to keep track of the number of users in the current group

        // Retrieve data from the JSON file
        $jsonData = file_get_contents(public_path('data_formateurs.json'));
        $formateursData = json_decode($jsonData, true);

        // Process data
        $jsonDataUtilisateur = [];

        foreach ($formateursData as $formateurtData) {
            // Generate email and password
            $email = $formateurtData['nom'].$formateurtData['prenom'].'@submti.com';
            $password = $formateurtData['nom'].$formateurtData['CIN'].rand(1, 10);

            // Create a new utilisateur record
            $utilisateur = new utilisateur();
            $utilisateur->email = $email;
            $utilisateur->password = Hash::make($password);
            $utilisateur->type = '';
            $utilisateur->newPassword = '';
            $utilisateur->save();

            // Add utilisateur data to jsonDataUtilisateur for exporting
            $jsonDataUtilisateur[] = [
                'nom' => $formateurtData['nom'],
                'prenom' => $formateurtData['prenom'],
                'CIN' => $formateurtData['CIN'],
                'email' => $utilisateur->email,
                'password' => $password, // Storing password before hashing
            ];

            $formateur = new formateur();

            $formateur->nom = $formateurtData['nom'];
            $formateur->prenom = $formateurtData['prenom'];
            $formateur->CIN = $formateurtData['CIN'];
            $formateur->dateNaissance = $formateurtData['dateNaissance'];
            $formateur->telephone = $formateurtData['telephone'];
            $formateur->addresse = $formateurtData['addresse'];
            $formateur->id = $utilisateur['id'];
            // Assign the id_classe (group) based on the current group index

            $formateur->save();

            // Increment the user count for the current group

        }

        // Convert utilisateur data to JSON
        $jsonUtilisateur = json_encode($jsonDataUtilisateur, JSON_PRETTY_PRINT);

        // Write utilisateur JSON to file
        $filePathUtilisateur = public_path('Acc_formateur.json');
        file_put_contents($filePathUtilisateur, $jsonUtilisateur);

        // Optionally, return a response
        return response()->json(['message' => 'Data exported successfully']);
    }

    public function index()
    {
        return view('formateur.index', [

            'messages' => message::all(),
            'formateurs' => formateur::all(),
            'filieres' => filiere::all(),
            'niveuax' => niveau::all(),
            'classes' => classe::all(),
            'etudients' => etudient::all(),
            'actualites' => actualite::all(),

            'utilisateurs' => utilisateur::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("formateur.create",[
            "classes"=>classe::all(),
            "niveaux"=>niveau::all(),
            "filieres"=>filiere::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(formateur $formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, formateur $formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(formateur $formateur)
    {
        //
    }
}
