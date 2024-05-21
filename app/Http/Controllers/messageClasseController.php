<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\message;
use App\Models\etudient;
use App\Models\actualite;
use App\Models\formateur;
use Illuminate\Http\Request;
use App\Models\messageClasse;
use App\Models\classeFormMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Auth;
use App\Models\utilisateur;

class messageClasseController extends Controller
{





    public function index($id_classe)
    {
       $etudiants=etudient::all();

       foreach ($etudiants as $etudiant) {
if ($etudiant->utilisateur->id === auth()->user()->id) {



        $messagesClasse = MessageClasse::where('id_classe', $id_classe)
            ->get();

        return view('messageClasse.index', compact('messagesClasse', 'id_classe'),[

            "messages"=>message::all(),
            "formateurs"=>formateur::all(),
            "filieres"=>filiere::all(),
            "niveuax"=>niveau::all(),
            "classes"=>classe::all(),
            "etudients"=>etudient::all(),
            "actualites"=>actualite::all(),
            "classeFormMessage"=>classeFormMessage::all(),






            "utilisateurs"=>utilisateur::all(),

           ]    );
    }}
    }



        public function store(Request $request)
        {
            $etudiants = etudient::all();

            foreach ($etudiants as $etudiant) {
                if ($etudiant->utilisateur->id === auth()->user()->id) {
                    $requestData = $request->only(['contenu', 'file', 'id_classe']);
                    $requestData['id_etudient'] = $etudiant->id_etudient;

                    // Check if a file is present in the request
                    if ($request->hasFile('file')) {
                        $requestData['file'] = $request->file('file')->store('messageClasse', 'public');
                    } else {
                        $requestData['file'] = null; // Set file to null if no file is uploaded
                    }
                    messageClasse::create($requestData);
                }
            }

            return redirect()->back();
        }










    public function show(messageClasse $messageClasse)
    {
        //
    }



    public function edit(messageClasse $messageClasse)
    {
        //
    }




    public function update(Request $request, messageClasse $messageClasse)
    {
        //
    }





    public function destroy(messageClasse $messageClasse)
    {
        //
    }
}
