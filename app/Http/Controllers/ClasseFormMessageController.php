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
use App\Models\messageClasse;

use App\Models\classeFormMessage;
use App\Http\Controllers\Controller;

class ClasseFormMessageController extends Controller
{




    public function index($id_classe)
    {
       $formateurs=formateur::all();

       foreach ($formateurs as $formateur) {
if ($formateur->utilisateur->id === auth()->user()->id) {



        $messageClasses = classeFormMessage::where('id_classe', $id_classe)->where("id_formateur",$formateur->id_formateur)->get();

        return view('classeFormMessage.index', compact('messageClasses', 'id_classe'),[

            "messages"=>message::all(),
            "formateurs"=>formateur::all(),
            "filieres"=>filiere::all(),
            "niveuax"=>niveau::all(),
            "classes"=>classe::all(),
            "etudients"=>etudient::all(),
            "actualites"=>actualite::all(),
            "classeFormMessage"=>classeFormMessage::all(),






            "utilisateurs"=>utilisateur::all(),

           ] );
    }}
    }




    public function indexEtud($id_classe)
    {
       $etudients=etudient::all();

       foreach ($etudients as $etudient) {
if ($etudient->utilisateur->id === auth()->user()->id) {



        $messages = classeFormMessage::where('id_classe', $id_classe)
            ->get();

        return view('classeFormMessage.indexEtud', compact('messages', 'id_classe'),[

            "messages"=>message::all(),
            "formateurs"=>formateur::all(),
            "filieres"=>filiere::all(),
            "niveuax"=>niveau::all(),
            "classes"=>classe::all(),
            "etudients"=>etudient::all(),
            "actualites"=>actualite::orderBy("created_at","desc")->get(),
            "classeFormMessage"=>classeFormMessage::all(),






            "utilisateurs"=>utilisateur::all(),

        ]);
    }}
    }












    public function store(Request $request)
    {
        $formateurs=formateur::all();

        foreach ($formateurs as $formateur) {
 if ($formateur->utilisateur->id === auth()->user()->id) {






$requestData = $request->only(['contenu', 'file', 'id_classe']);
$requestData['id_formateur'] = $formateur->id_formateur;

// Check if a file is present in the request
if ($request->hasFile('file')) {
    $requestData['file'] = $request->file('file')->store('message', 'public');
} else {
    $requestData['file'] = null; // Set file to null if no file is uploaded
}
classeFormMessage::create($requestData);

return redirect()->back();
}
}

}



}
