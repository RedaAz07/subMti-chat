<?php

namespace App\Models;

use App\Models\groupe;
use App\Models\utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class etudient extends Model
{
    use HasFactory;
    protected $fillable =["nom","prenom","telephone","addresse","CIN","dateNaissance","id"];
    protected $primaryKey="id_etudient";


    public function groupe(){
        return $this->belongsTo(groupe::class,'id_groupe');
}

public function utiliateur(){
    return $this->belongsTo(utilisateur::class,'id');
}




}
