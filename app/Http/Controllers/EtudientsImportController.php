<?php

namespace App\Http\Controllers;

use App\Imports\etudientImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EtudientsImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('message.index');

    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new etudientImport, $file);

        return back();
    }
}
