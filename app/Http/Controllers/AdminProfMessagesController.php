<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\adminEtudMessages;
use App\Models\adminProfMessages;
use App\Http\Controllers\Controller;

class AdminProfMessagesController extends Controller
{





    public function index($id_form)
    {
        $admins = admin::all();
        $messages = [];

        foreach ($admins as $admin) {
            if ($admin->utilisateur->id === auth()->user()->id) {
                $messages = adminProfMessages::where(function ($query) use ($id_form, $admin) {
                    $query->where('id_admin', $admin->id_admin)
                          ->where('id_formateur', $id_form);
                })->orWhere(function ($query) use ($id_form, $admin) {
                    $query->where('id_formateur', $id_form)
                          ->where('id_admin', $admin->id_admin);
                })->get();
            }
        }

        return view('adminProfMessages.index', compact('messages', 'id_form'));
    }


    public function store(Request $request)
    {







$admins=admin::all();
foreach ($admins as $admin) {


    if ($admin->utilisateur->id=== auth()->user()->id) {
        adminProfMessages::create([
            'contenu' => $request->input('contenu'),
            'file' => $request->input('file'),
            'id_admin' => $admin->id_admin,
            'id_formateur' => $request->input('id_formateur'),
        ]);
        return redirect()->back();
    }

}








    }














}
