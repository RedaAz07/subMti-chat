<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\message;
use App\Models\etudient;
use App\Models\actualite;
use App\Models\formateur;
use App\Models\utilisateur;
use App\Models\classeFormMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('message.index', [

        "messages"=>message::orderBy('created_at', 'desc')->get(),
        "formateurs"=>formateur::all(),
        "filieres"=>filiere::all(),
        "niveuax"=>niveau::all(),
        "classes"=>classe::all(),
        "etudients"=>etudient::all(),
        "actualites"=>actualite::all(),
        "admins"=>admin::all(),

        "classeFormMessage"=>classeFormMessage::all(),


            'utilisateurs' => utilisateur::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('message.index', [

            'messages' => message::all(),
            'etudients' => etudient::all(),

        ]);
    }

    public function store(Request $request)
    {
        $requestData = $request->except('_token'); // Exclude the CSRF token
        $requestData['id'] = auth()->id(); // Add the authenticated user's ID to the request data

        // Check if a file is present in the request
        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')->store('message', 'public');
        } else {
            $requestData['file'] = null; // Set file to null if no file is uploaded
        }
        if ($request->input('contenu') === null) {

            $requestData['contenu'] = '';
        }

        // Create the message
        message::create($requestData);

        // Redirect back to the message index page
        return redirect()->route('message.index');
    }







    public function importEtudiant(Request $request)
    {
        $file = $request->file('file');

        // Import data from Excel file
        $import = new EtudientImport();
        Excel::import($import, $file);

        // After import, get the data for export
        $exportData = $import->getExportData();

        // Export the data to a JSON file
        $exportFile = 'etudiants.json';
        $export = new EtudiantExport($exportData);
        Excel::store($export, $exportFile);

        return back();
    }
    public function etudiantExport()
{
    // Retrieve all students from the database
    $students = etudient::all();

    // Prepare the export data
    $exportData = [];

    foreach ($students as $student) {
        // Assuming $student is an instance of Etudiant model
        $exportData[] = [
            'email' => $student->user->email,
            'password' => $student->user->password,
            'name' => $student->name,
            'CIN' => $student->CIN,
            'prenom' => $student->prenom,
        ];
    }

    // Create an instance of EtudiantExport and return it
    $export = new EtudiantExport($exportData);

    // Export the data to a JSON file
    $exportFile = 'all_etudiants.json';
    Excel::store($export, $exportFile);

    return back();
}








    public function download($filename)
    {
        $file = Storage::disk('public')->path($filename);

        return response()->download($file);
    }

    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function groupe($groupId)
    {
        return view('message.groupe', [
            'groupId' => $groupId,
            'etudients' => etudient::all(),
            'messages' => message::all(),

        ]);
    }


    public function destroy(message $message)
    {
        $message->delete();

    }



}
