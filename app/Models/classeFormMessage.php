<?php

namespace App\Models;

use App\Models\classe;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class classeFormMessage extends Model
{
    protected $fillable =["file","contenu","id_formateur","id_classe"];

    use HasFactory;

    protected $table = 'classe_form_messages';
    public function formateur(){
        return $this->belongsTo(formateur::class,'id_formateur');
}


public function classe(){
    return $this->belongsTo(classe::class,'id_classe');
}
}
