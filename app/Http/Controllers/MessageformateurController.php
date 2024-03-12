<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\etudient;
use App\Models\formateur;
use Illuminate\Http\Request;
use App\Models\messageformateur;
use App\Http\Controllers\Controller;

class MessageformateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */




     public function show_form($id_for)
     {
         // Retrieve all messages between the student and the teacher
         $messages = MessageFormateur::where(function ($query) use ($id_for) {
             $query->where('id_etudient', auth()->id())
                   ->where('id_formateur', $id_for);
         })->orWhere(function ($query) use ($id_for) {
             $query->where('id_formateur', $id_for)
                   ->where('id_etudient', auth()->id());
         })->get();

         return view('messageformateur.show_form', compact('messages', 'id_for'));
     }



     public function store(Request $request)
     {
        
         messageformateur::create([
             'contenu' => $request->input('contenu'),
             "file"=>$request->input("file"),
             'id_etudient' => auth()->id(),
             'id_formateur' => $request->input('id_formateur'),
         ]);

         return redirect()->back();
     }





    public function show(messageformateur $messageformateur)
    {
        //
    }



    public function edit(messageformateur $messageformateur)
    {
        //
    }




    public function update(Request $request, messageformateur $messageformateur)
    {
        //
    }




    public function destroy(messageformateur $messageformateur)
    {
        //
    }
}
