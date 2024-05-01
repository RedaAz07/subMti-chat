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
use App\Models\classeFormMessage;
use App\Http\Controllers\Controller;

class AdminEtudMessagesController extends Controller
{

public function showEtuds($id_etud)
    {
        $admins = admin::all();
        $messageEtudient = [];

        foreach ($admins as $admin) {
            if ($admin->utilisateur->id === auth()->user()->id) {
                $messageEtudient = adminEtudMessages::where(function ($query) use ($id_etud, $admin) {
                    $query->where('id_admin', $admin->id_admin)
                          ->where('id_etudient', $id_etud);
                })->orWhere(function ($query) use ($id_etud, $admin) {
                    $query->where('id_etudient', $id_etud)
                          ->where('id_admin', $admin->id_admin);
                })->get();
            }
        }

        return view('adminEtudMessages.showEtuds', compact('messageEtudient', 'id_etud'),[

            "messages"=>message::all(),
            "formateurs"=>formateur::all(),
            "filieres"=>filiere::all(),
            "niveuax"=>niveau::all(),
            "classes"=>classe::all(),
            "etudients"=>etudient::all(),
            "actualites"=>actualite::all(),
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
        $requestData = $request->only(['contenu', 'file', 'id_etudient']);
                $requestData['id_admin'] = $admin->id_admin;

                // Check if a file is present in the request
                if ($request->hasFile('file')) {
                    $requestData['file'] = $request->file('file')->store('message', 'public');
                } else {
                    $requestData['file'] = null; // Set file to null if no file is uploaded
                }

                adminEtudMessages::create($requestData);
    }

}
return redirect()->back();
    }






//    etudient




    public function showAdmins($id_admin)
    {
        $etudients = etudient::all();
        $messages = [];

        foreach ($etudients as $etudient) {
            if ($etudient->utilisateur->id === auth()->user()->id) {
                $messages = adminEtudMessages::where(function ($query) use ($id_admin, $etudient) {
                    $query->where('id_etudient', $etudient->id_etudient)
                          ->where('id_admin', $id_admin);
                })->orWhere(function ($query) use ($id_admin, $etudient) {
                    $query->where('id_admin', $id_admin)
                          ->where('id_etudient', $etudient->id_etudient);
                })->get();
            }
        }

        return view('adminEtudMessages.showAdmin', compact('messages', 'id_admin'),[

            "messages"=>message::all(),
            "formateurs"=>formateur::all(),
            "filieres"=>filiere::all(),
            "niveuax"=>niveau::all(),
            "classes"=>classe::all(),
            "etudients"=>etudient::all(),
            "actualites"=>actualite::all(),
            "classeFormMessage"=>classeFormMessage::all(),
            "admins"=>admin::all(),
            "utilisateurs"=>utilisateur::all(),

           ]);
    }





    public function storeAdmin(Request $request)
    {

$etudients=etudient::all();
foreach ($etudients as $etudient) {


    if ($etudient->utilisateur->id=== auth()->user()->id) {



        $requestData = $request->only(['contenu', 'file', 'id_admin']);
        $requestData['id_etudient'] = $etudient->id_etudient;

        // Check if a file is present in the request
        if ($request->hasFile('file')) {
            $requestData['file'] = $request->file('file')->store('message', 'public');
        } else {
            $requestData['file'] = null; // Set file to null if no file is uploaded
        }

        adminEtudMessages::create($requestData);
        return redirect()->back();
    }

}
    }




















public function showLastAdminMessage($id_etud)
    {
        $admins = admin::all();
        $messages = [];

        foreach ($admins as $admin) {
            if ($admin->utilisateur->id === auth()->user()->id) {
                $messaaa = adminEtudMessages::where(function ($query) use ($id_etud, $admin) {
                    $query->where('id_admin', $admin->id_admin)
                          ->where('id_etudient', $id_etud);
                })->orWhere(function ($query) use ($id_etud, $admin) {
                    $query->where('id_etudient', $id_etud)
                          ->where('id_admin', $admin->id_admin);
                })->latest()->first();
            }
        }

        return view('message.index', compact('messaaa', 'id_etud'));
    }



}

