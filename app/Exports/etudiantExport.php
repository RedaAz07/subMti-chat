<?php

namespace App\Exports;

use App\Models\etudient;
use Maatwebsite\Excel\Concerns\FromCollection;

class etudiantExport implements FromCollection
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }
}
