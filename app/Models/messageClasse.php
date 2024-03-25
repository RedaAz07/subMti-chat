<?php

namespace App\Models;

use App\Models\classe;
use App\Models\etudient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class messageClasse extends Model
{
    protected $fillable =["file","contenu"];

    use HasFactory;

    public function etudient(){
        return $this->belongsTo(etudient::class,'id_etudient');
}


public function classe(){
    return $this->belongsTo(classe::class,'id_classe');
}


}
