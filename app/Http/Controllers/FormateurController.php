<?php

namespace App\Http\Controllers;

use classes;
use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\message;
use App\Models\etudient;
use App\Models\actualite;
use App\Models\formateur;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use App\Exports\frmateurExport;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class FormateurController extends Controller
{











    public function index()
    {
        return view('formateur.index', [

            'messages' => message::all(),
            'formateurs' => formateur::all(),
            'filieres' => filiere::all(),
            'niveuax' => niveau::all(),
            'classes' => classe::all(),
            'etudients' => etudient::all(),
            "actualites"=>actualite::orderBy("created_at","desc")->get(),

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
        $password = strip_tags($request->input("nom")) . strip_tags($request->input("CIN")) . rand(100, 999);
        $utilisateur = new utilisateur();
        $utilisateur->email = strip_tags($request->input("nom")) . strip_tags($request->input("prenom")) . "@subMti.com";
        $utilisateur->password = Hash::make($password);
        $utilisateur->newPassword = $password;
        $utilisateur->type = "formateur";

        // Set utilisateur attributes before saving


        $utilisateur->save();

        $formateur = new formateur();
        $formateur->id = $utilisateur->id; // Use the ID of the newly created utilisateur
        $formateur->nom = strip_tags($request->input("nom"));
        $formateur->prenom = strip_tags($request->input("prenom"));
        $formateur->CIN = strip_tags($request->input("CIN"));
        $formateur->telephone = strip_tags($request->input("telephone"));
        $formateur->addresse = strip_tags($request->input("addresse"));
        $formateur->dateNaissance = strip_tags($request->input("dateNaissance"));

        // Save the formateur instance before attaching classes
        $formateur->save();

        // Attach the selected classes to the formateur
        $formateur->classes()->attach($request->input('classes'));

        return redirect()->route('message.index')->with('success', 'Formateur created successfully.');
    }



    public function export()
    {

        return Excel::download(new  frmateurExport , "formateurACC.xlsx");
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
