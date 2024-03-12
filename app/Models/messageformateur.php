<?php

namespace App\Models;

use App\Models\etudient;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class messageformateur extends Model
{
    protected $fillable =["id_formateur","id_etudient","contenu","file"];
    use HasFactory;



    public function etudient(){
        return $this->belongsTo(etudient::class,'id_etudient');
}


public function formateur(){
    return $this->belongsTo(formateur::class,'id_formateur');
}


}
