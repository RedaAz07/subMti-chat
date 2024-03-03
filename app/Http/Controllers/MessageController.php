<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\niveau;
use App\Models\filiere;
use App\Models\message;
use App\Models\formateur;
use App\Models\utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view("message.index",[

        "messages"=>message::all(),
        "formateurs"=>formateur::all(),
        "filieres"=>filiere::all(),
        "niveuax"=>niveau::all(),
        "classe"=>classe::all(),



        "utilisateurs"=>utilisateur::all(),

       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("message.index",[

            "messages"=>message::all()
           ]);
    }



    public function fetch()
    {
        // Retrieve messages from the database
        $messages = message::orderBy('created_at')->get();

        // Return the messages as a JSON response
        return response()->json(['messages' => $messages]);
    }




    public function store(Request $request)
    {
        $request->validate([
            "contenu"=>"string|required",
            "file"=>"required",

        ]);
        $requestData=$request->all();
        $requestData["file"] =$request->file("file")->store("message","public") ;
        $requestData["id"]=auth::user()->id;

        message::create($requestData);
        return redirect("message");
        message::create($requestData);
        return redirect("message");
        message::create($request->post());
        return redirect()->route("message.index");
    }





    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(message $message)
    {
        $message->delete();
        return redirect()->route("message.index");
    }
}
