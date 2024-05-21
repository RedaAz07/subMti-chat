<?php

namespace App\Exports;

use App\Models\utilisateur;
use Maatwebsite\Excel\Concerns\FromCollection;

class frmateurExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $formateur = utilisateur::join('formateurs', 'utilisateurs.id', '=', 'formateurs.id')
        ->select('formateurs.CIN', 'formateurs.nom', 'formateurs.prenom', 'utilisateurs.email', 'utilisateurs.newPassword')
        ->get();

        return $formateur;
    }
}
