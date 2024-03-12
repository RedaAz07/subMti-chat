<?php

namespace App\Http\Controllers;

use App\Models\etudient;
use Illuminate\Http\Request;
use App\Models\messageClasse;
use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Auth;

class messageClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        
return view("messageClasse.index",
[

"messageClasses"=>messageClasse::all(),
"etudients"=>etudient::all(),


]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("messageClasse.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
