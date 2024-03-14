<?php

namespace App\Models;


use App\Models\actualite;
use App\Models\utilisateur;
use App\Models\adminEtudMessages;
use App\Models\adminProfMessages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
{
    use HasFactory;

    protected $fillable =["id","nom","prenom","telephone","addresse","CIN","dateNaissance"];
    protected $primaryKey="id_admin";




    public function Actualite(){
        return $this->hasMany(actualite::class,'id_actualite');
}

public function utilisateur()
{
    return $this->belongsTo(utilisateur::class, 'id', 'id');
}





public function adminEtudMessages(){
    return $this->hasMany(adminEtudMessages::class,'id');
}




public function adminProfMessages(){
    return $this->hasMany(adminProfMessages::class,'id');
}




}
