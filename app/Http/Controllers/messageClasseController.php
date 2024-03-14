<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\messageClasse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageGroupeController extends Controller
=======
use App\Models\etudient;
use Illuminate\Http\Request;
use App\Models\messageClasse;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Auth;

class messageClasseController extends Controller
>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
        //
=======



        
return view("messageClasse.index",
[

"messageClasses"=>messageClasse::all(),
"etudients"=>etudient::all(),


]);


>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        //
=======
        return view("messageClasse.index");
>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        //
    }

    /**
     * Display the specified resource.
     */
=======
        $request->validate([
            "contenu"=>"string|required",
            "file"=>"required",

        ]);

        $etudients=etudient::all();
        $requestData=$request->all();
        $requestData["file"] =$request->file("file")->store("message","public") ;




        foreach ($etudients as $etudient) {
if (auth::user()->id === $etudient->id_etudient) {
    $requestData["id_classe"]=$etudient->classe->id_classe;


        $requestData["id_etudient"]=$etudient->id_etudient;




}



        }








        messageClasse::create($requestData);
        return redirect("messageClasse");

        messageClasse::create($request->post());
        return redirect()->route("messageClasse.index");




    }



>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
    public function show(messageClasse $messageClasse)
    {
        //
    }

<<<<<<< HEAD
    /**
     * Show the form for editing the specified resource.
     */
=======


>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
    public function edit(messageClasse $messageClasse)
    {
        //
    }

<<<<<<< HEAD
    /**
     * Update the specified resource in storage.
     */
=======



>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
    public function update(Request $request, messageClasse $messageClasse)
    {
        //
    }

<<<<<<< HEAD
    /**
     * Remove the specified resource from storage.
     */
=======




>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
    public function destroy(messageClasse $messageClasse)
    {
        //
    }
}
