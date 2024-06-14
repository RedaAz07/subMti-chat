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
use App\Models\classeFormMessage;
use Illuminate\Support\Facades\Auth;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('actualites.create',[

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
            'actualites' => actualite::all(),
           ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenu' => 'string|required',
            'file' => 'required',

        ]);
$admins=admin::all();

foreach ($admins as $key) {
    if ($key->utilisateur->id=== auth()->user()->id) {



        $requestData = $request->all();

    $requestData['file'] = $request->input("file");



        $requestData['id_admin'] = $key->id_admin;

        actualite::create($requestData);

        return redirect()->route('actualites.create');
        actualite::create($requestData);

        return redirect()->route('actualites.create');
        actualite::create($request->post());

        return redirect()->route('actualites.create');
    }    }
    return redirect()->route('actualites.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(actualite $actualite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(actualite $actualite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, actualite $actualite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(actualite $actualite)
    {
        //
    }
}
