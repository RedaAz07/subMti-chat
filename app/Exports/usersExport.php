<?php

namespace App\Exports;

use App\Models\utilisateur;
use Maatwebsite\Excel\Concerns\FromCollection;

class usersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        $user = utilisateur::join('etudients', 'utilisateurs.id', '=', 'etudients.id')
        ->select('etudients.CIN', 'etudients.nom', 'etudients.prenom', 'utilisateurs.email', 'utilisateurs.newPassword')
        ->get();

        return $user;
    }
}
