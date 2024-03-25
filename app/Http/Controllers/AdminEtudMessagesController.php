<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\etudient;
use Illuminate\Http\Request;
use App\Models\adminEtudMessages;
use App\Http\Controllers\Controller;

class AdminEtudMessagesController extends Controller
{

public function showEtuds($id_etud)
    {
        $admins = admin::all();
        $messages = [];

        foreach ($admins as $admin) {
            if ($admin->utilisateur->id === auth()->user()->id) {
                $messages = adminEtudMessages::where(function ($query) use ($id_etud, $admin) {
                    $query->where('id_admin', $admin->id_admin)
                          ->where('id_etudient', $id_etud);
                })->orWhere(function ($query) use ($id_etud, $admin) {
                    $query->where('id_etudient', $id_etud)
                          ->where('id_admin', $admin->id_admin);
                })->get();
            }
        }

        return view('adminEtudMessages.showEtuds', compact('messages', 'id_etud'));
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

        return view('adminEtudMessages.showAdmin', compact('messages', 'id_admin'));
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



















public function showLastAdminMessage($id_admin)
{
    $etudients = Etudient::all();
    $messages = [];

    foreach ($etudients as $etudient) {
        if ($etudient->utilisateur->id === auth()->user()->id) {
            // Retrieve the last message between the student and the admin
            $last_message = AdminEtudMessages::where(function ($query) use ($id_admin, $etudient) {
                $query->where('id_etudient', $etudient->id_etudient)
                      ->where('id_admin', $id_admin);
            })->orWhere(function ($query) use ($id_admin, $etudient) {
                $query->where('id_admin', $id_admin)
                      ->where('id_etudient', $etudient->id_etudient);
            })->latest()->first();

            $messages[] = $last_message; // Add the last message to the messages array
        }
    }

    return view('adminEtudMessages.showLastAdminMessage', compact('messages', 'id_admin'));
}


}
