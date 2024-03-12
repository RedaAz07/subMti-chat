<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{






    public function exportDataadmin()
    {


          // Retrieve data from the JSON file
          $jsonData = file_get_contents(public_path('data_json/data_admins.json'));
          $adminsData = json_decode($jsonData, true);




        // Process data
        $jsonDataUtilisateur = [];

        foreach ($adminsData as $adminData) {
            // Generate email and password
            $email = $adminData['nom'] . $adminData['prenom']. $adminData['CIN'] . "admin@submti.com";
            $password = $adminData['nom'] . $adminData['CIN'] . rand(1, 10);

            // Create a new utilisateur record
            $utilisateur = new utilisateur();
            $utilisateur->email = $email;
            $utilisateur->password = Hash::make($password);
            $utilisateur->type = "";
            $utilisateur->newPassword = "";
            $utilisateur->save();

            // Add utilisateur data to jsonDataUtilisateur for exporting
            $jsonDataUtilisateur[] = [
                'nom' => $adminData['nom'],
                'prenom' => $adminData['prenom'],
                'CIN' => $adminData['CIN'],
                'email' => $utilisateur->email,
                'password' => $password, // Storing password before hashing
            ];


            $admin = new admin();

            $admin->nom = $adminData['nom'];
            $admin->prenom = $adminData['prenom'];

            $admin->role = "admin";

            $admin->CIN = $adminData['CIN'];
            $admin->dateNaissance = $adminData['dateNaissance'];
            $admin->telephone = $adminData['telephone'];
            $admin->addresse = $adminData['addresse'];


            $admin->id = $utilisateur['id'];
            // Assign the id_classe (group) based on the current group index

            $admin->save();

            // Increment the user count for the current group





        }

        // Convert utilisateur data to JSON
        $jsonUtilisateur = json_encode($jsonDataUtilisateur, JSON_PRETTY_PRINT);

        // Write utilisateur JSON to file
        $filePathUtilisateur = public_path('data_json/Acc_admin.json');
        file_put_contents($filePathUtilisateur, $jsonUtilisateur);

        // Optionally, return a response
        return response()->json(['message' => 'Data exported successfully']);
    }









    public function index()
    {
        return view( "Admin.index" );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        //
    }
}
