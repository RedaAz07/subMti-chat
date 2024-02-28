<?php

namespace App\Http\Controllers;

use App\Models\etudient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudientController extends Controller
{





    public function exportData()
    {
        // Retrieve data from the database
        $etudients = etudient::all(); // Fetch all records from the table

        // Process data
        $jsonData = [];
        foreach ($etudients as $etudient) {
            $record = [
                'Id' => $etudient->id_etudient,
                'Email' => $etudient->nom . $etudient->prenom.$etudient->CIN.'@submti.ma',
                'Password' => $etudient->nom . $etudient->CIN . rand(1, 1000),
                'New password' => '', // You can set this value as needed
                'Type' => 'etudient', // You can set this value as needed
            ];
            $jsonData[] = $record;
        }

        // Convert data to JSON
        $json = json_encode($jsonData, JSON_PRETTY_PRINT);

        // Write JSON to file
        $filePath = public_path('etudient.json');
        file_put_contents($filePath, $json);

        // Optionally, return a response
        return response()->json(['message' => 'Data exported successfully']);
    }




    /**
     * Display a listing of the resource.
     */
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
        //
    }
}
