<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\etudient;
use App\Models\formateur;
use Illuminate\Http\Request;
use App\Models\messageformateur;
use App\Http\Controllers\Controller;



use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\actualite;
use App\Models\messageClasse;
use App\Models\classeFormMessage;
use Illuminate\Support\facades\Auth;
use App\Models\utilisateur;
class MessageformateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */


// the page etudient

     public function show_form($id_for)
     {
        $etudients = etudient::all();
        $messagesFormateurs = [];

        foreach ($etudients as $etudient) {
            if ($etudient->utilisateur->id === auth()->user()->id) {
                $messagesFormateurs = messageformateur::where(function ($query) use ($id_for, $etudient) {
                    $query->where('id_etudient', $etudient->id_fetudient)
                          ->where('id_formateur', $id_for);
                })->orWhere(function ($query) use ($id_for, $etudient) {
                    $query->where('id_formateur', $id_for)
                          ->where('id_etudient', $etudient->id_etudient);
                })->get();
            }
        }





         return view('messageformateur.indexEtud', compact('messagesFormateurs', 'id_for'),[

            "messages"=>message::all(),
            "formateurs"=>formateur::all(),
            "filieres"=>filiere::all(),
            "niveuax"=>niveau::all(),
            "classes"=>classe::all(),
            "etudients"=>etudient::all(),
            "actualites"=>actualite::orderBy("created_at","desc")->get(),
            "classeFormMessage"=>classeFormMessage::all(),






            "utilisateurs"=>utilisateur::all(),

           ] );
     }



     public function store(Request $request)
     {
         $etudients = etudient::all();

         foreach ($etudients as $etudient) {
             if ($etudient->utilisateur->id === auth()->id()) {
                 $requestData = $request->only(['contenu', 'file', 'id_formateur']);
                 $requestData['id_etudient'] = $etudient->id_etudient;

                 // Check if a file is present in the request
                 if ($request->hasFile('file')) {
                     $requestData['file'] = $request->file('file')->store('message', 'public');
                 } else {
                     $requestData['file'] = null; // Set file to null if no file is uploaded
                 }

                 messageformateur::create($requestData);
             }
         }

         return redirect()->back();
     }





//  the page formateur







public function show_Etud($id_for)
{
    $formateurs = formateur::all();
    $messageEtudient = [];

    foreach ($formateurs as $formateur) {
        if ($formateur->utilisateur->id === auth()->user()->id) {
            $messageEtudient = messageformateur::where(function ($query) use ($id_for, $formateur) {
                $query->where('id_formateur', $formateur->id_formateur)
                      ->where('id_etudient', $id_for);
            })->orWhere(function ($query) use ($id_for, $formateur) {
                $query->where('id_etudient', $id_for)
                      ->where('id_formateur', $formateur->id_formateur);
            })->orderBy('created_at', 'desc')->get();
        }
    }

    return view('messageformateur.indexForm', compact('messageEtudient', 'id_for'),[

        "messages"=>message::all(),
        "formateurs"=>formateur::all(),
        "filieres"=>filiere::all(),
        "niveuax"=>niveau::all(),
        "classes"=>classe::all(),
        "etudients"=>etudient::all(),
        "actualites"=>actualite::orderBy("created_at","desc")->get(),
        "classeFormMessage"=>classeFormMessage::all(),






        "utilisateurs"=>utilisateur::all(),

       ] );
}


public function storeEtud(Request $request)
{







$formateurs=formateur::all();
foreach ($formateurs as $formateur) {


if ($formateur->utilisateur->id=== auth()->user()->id) {


    $requestData = $request->only(['contenu', 'file', 'id_etudient']);
    $requestData['id_formateur'] = $formateur->id_formateur;

    // Check if a file is present in the request
    if ($request->hasFile('file')) {
        $requestData['file'] = $request->file('file')->store('message', 'public');
    } else {
        $requestData['file'] = null; // Set file to null if no file is uploaded
    }

    messageformateur::create($requestData);
}
}







    return redirect()->back();
}

}







