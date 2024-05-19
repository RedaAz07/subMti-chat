<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersExportController extends Controller
{
    public function index()
    {
        return view('users.export');

    }

    public function indexExport()
    {
        return view('users.indexExport');

    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');

    }
}
