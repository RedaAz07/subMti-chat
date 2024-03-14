<?php

namespace App\Http\Controllers;

use App\Models\admin;
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
        adminEtudMessages::create([
            'contenu' => $request->input('contenu'),
            'file' => $request->input('file'),
            'id_admin' => $admin->id_admin,
            'id_etudient' => $request->input('id_etudient'),
        ]);
        return redirect()->back();
    }

}








    }

















}
