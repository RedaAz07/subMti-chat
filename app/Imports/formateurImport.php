<?php

namespace App\Imports;

use App\Models\formateur;
use Maatwebsite\Excel\Concerns\ToModel;

class formateurImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new formateur([
            //
        ]);
    }
}
