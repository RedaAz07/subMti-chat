<?php

namespace App\Models;


use App\Models\actualite;
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
}
