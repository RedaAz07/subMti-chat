<?php

namespace App\Http\Controllers;

use App\Imports\user;
use App\Models\person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\usersExport;

class importExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return view("import.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function import(Request $request)
    {

        $request->validate([
        "file"=>"required"
    ]);
Excel::import(new user,$request->file("file") );

 return redirect()->back()->with('success','Le fichier Excel a été importé avec succès');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function export()
    {

        return Excel::download(new  usersExport , "userrr.xlsx");
    }



//                          import and export formateur



    public function importFormateur(Request $request){




    }



     public function exportFormateur(){


     }



}
