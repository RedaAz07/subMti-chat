<?php

namespace App\Http\Controllers;

use App\Models\etudient;
use App\Models\formateur;
use Illuminate\Http\Request;
use App\Models\classeFormMessage;
use App\Http\Controllers\Controller;

class ClasseFormMessageController extends Controller
{




    public function index($id_classe)
    {
       $formateurs=formateur::all();

       foreach ($formateurs as $formateur) {
if ($formateur->utilisateur->id === auth()->user()->id) {



        $messages = classeFormMessage::where('id_classe', $id_classe)->where("id_formateur",$formateur->id_formateur)->get();

        return view('classeFormMessage.index', compact('messages', 'id_classe'));
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
            "formateurs"=>formateur::all(),
        ]);
    }}
    }












    public function store(Request $request)
    {
        $formateurs=formateur::all();

        foreach ($formateurs as $formateur) {
 if ($formateur->utilisateur->id === auth()->user()->id) {




}

$requestData = $request->only(['contenu', 'file', 'id_classe']);
$requestData['id_formateur'] = $formateur->id_formateur;

// Check if a file is present in the request
if ($request->hasFile('file')) {
    $requestData['file'] = $request->file('file')->store('message', 'public');
} else {
    $requestData['file'] = null; // Set file to null if no file is uploaded
}
classeFormMessage::create($requestData);
}
return redirect()->back();
}






}
