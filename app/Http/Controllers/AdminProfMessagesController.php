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
use Illuminate\Http\Request;
use App\Models\adminEtudMessages;
use App\Models\adminProfMessages;
use App\Models\classeFormMessage;
use App\Http\Controllers\Controller;

class AdminProfMessagesController extends Controller
{



// view d Admin

    public function index($id_form)
    {
        $admins = admin::all();
        $messageFormateur = [];

        foreach ($admins as $admin) {
            if ($admin->utilisateur->id === auth()->user()->id) {
                $messageFormateur = adminProfMessages::where(function ($query) use ($id_form, $admin) {
                    $query->where('id_admin', $admin->id_admin)
                          ->where('id_formateur', $id_form);
                })->orWhere(function ($query) use ($id_form, $admin) {
                    $query->where('id_formateur', $id_form)
                          ->where('id_admin', $admin->id_admin);
                })->get();
            }
        }

        return view('adminProfMessages.index', compact('messageFormateur', 'id_form'),[

            "messages"=>message::all(),
            "formateurs"=>formateur::all(),
            "filieres"=>filiere::all(),
            "niveuax"=>niveau::all(),
            "classes"=>classe::all(),
            "etudients"=>etudient::all(),
            "actualites"=>actualite::orderBy("created_at","desc")->get(),
            "classeFormMessage"=>classeFormMessage::all(),
            "admins"=>admin::all(),
            "utilisateurs"=>utilisateur::all(),

           ]);
    }


    public function store(Request $request)
    {







$admins=admin::all();
foreach ($admins as $admin) {


    if ($admin->utilisateur->id=== auth()->user()->id) {



        $requestData = $request->only(['contenu', 'file', 'id_formateur']);
        $requestData['id_admin'] = $admin->id_admin;

        // Check if a file is present in the request
        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')->store('message', 'public');
        } else {
            $requestData['file'] = null; // Set file to null if no file is uploaded
        }
        adminProfMessages::create($requestData);
    }
    return redirect()->back();

}








    }





// -> le view de formateur



public function showAdmin($id_admin)
{
    $formateurs = formateur::all();
    $messages = [];

    foreach ($formateurs as $formateur) {
        if ($formateur->utilisateur->id === auth()->user()->id) {
            $messages = adminProfMessages::where(function ($query) use ($id_admin, $formateur) {
                $query->where('id_formateur', $formateur->id_formateur)
                      ->where('id_admin', $id_admin);
            })->orWhere(function ($query) use ($id_admin, $formateur) {
                $query->where('id_formateur', $id_admin)
                      ->where('id_formateur', $formateur->id_formateur);
            })->get();
        }
    }

    return view('adminProfMessages.prof', compact('messages', 'id_admin'),[




        "messages"=>message::all(),
        "formateurs"=>formateur::all(),
        "filieres"=>filiere::all(),
        "niveuax"=>niveau::all(),
        "classes"=>classe::all(),
        "etudients"=>etudient::all(),
        "actualites"=>actualite::orderBy("created_at","desc")->get(),
        "classeFormMessage"=>classeFormMessage::all(),
        "admins"=>admin::all(),
        "utilisateurs"=>utilisateur::all(),


    ]








);
}


public function storeAdmin(Request $request)
{







$formateurs=formateur::all();
foreach ($formateurs as $formateur) {


if ($formateur->utilisateur->id=== auth()->user()->id) {


    $requestData = $request->only(['contenu', 'file', 'id_admin']);
    $requestData['id_formateur'] = $formateur->id_formateur;

    // Check if a file is present in the request
    if ($request->hasFile('file')) {
        $requestData['file'] = $request->file('file')->store('message', 'public');
    } else {
        $requestData['file'] = null; // Set file to null if no file is uploaded
    }


    adminProfMessages::create($requestData);
}

}








return  redirect()->back();
}




    public function destroy($id)
    {
        $formateur = formateur::find($id);

        if ($formateur) {
            $utilisateur = $formateur->utilisateur;

            $formateur->delete();
            if ($utilisateur) {
                // Delete related messages
                $utilisateur->message()->delete();

                // Delete the utilisateur
                $utilisateur->delete();
            }

            // Detach from classes
            $formateur->classes()->detach();

            // Delete the formateur

        }

        return redirect()->route("message.index");
    }





}
