<?php

namespace App\Http\Controllers;

use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{

    public function importData(Request $request)
    {
        // Read JSON file
        $json = file_get_contents('etudient.json');

        // Parse JSON data
        $data = json_decode($json, true); // true to convert to associative array

        // Update data in database
        foreach ($data as $record) {
            // Find the record in the database by some unique identifier, e.g., ID
            $id_utilisateur = $record['Id']; // Assuming the JSON contains an id_utilisateur field

            // Retrieve the corresponding record from the database
            $update = utilisateur::where('id', $id_utilisateur)->first();

            // Check if the record exists
            if ($update) {
                // Update attributes based on JSON data
                $update->email = $record["Email"];
                $update->newPassword = $record["New password"];
                $update->password = Hash::make($record["Password"]);
                $update->type = $record["Type"];

                // Save the updated record
                $update->save();
            } else {
                // Handle the case where the record is not found
                // For example, log an error or skip updating the record
                // You can add your own logic here
            }
        }

        // Optionally, return a response
        return response()->json(['message' => 'Data imported successfully']);
    }


//import from  formateur

public function importDataf(Request $request)
{
    // Read JSON file
    $json = file_get_contents('formateur.json');

    // Parse JSON data
    $data = json_decode($json, true); // true to convert to associative array

    // Update data in database
    foreach ($data as $record) {
        // Find the record in the database by some unique identifier, e.g., ID
        $id_utilisateur = $record['Id fourmateur']; // Assuming the JSON contains an id_utilisateur field

        // Retrieve the corresponding record from the database
        $update = utilisateur::where('id', $id_utilisateur)->first();

        // Check if the record exists
        if ($update) {
            // Update attributes based on JSON data
            $update->email = $record["Email"];
            $update->newPassword = $record["New password"];
            $update->password = Hash::make($record["Password"]);
            $update->type = $record["Type"];

            // Save the updated record
            $update->save();
        } else {
            // Handle the case where the record is not found
            // For example, log an error or skip updating the record
            // You can add your own logic here
        }
    }

    // Optionally, return a response
    return response()->json(['message' => 'Data imported successfully']);
}









    public function index()
    {
        //
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
    public function show(utilisateur $utilisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(utilisateur $utilisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, utilisateur $utilisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(utilisateur $utilisateur)
    {
        //
    }
}
