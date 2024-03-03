<?php

namespace App\Models;

use App\Models\annance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $fillable =["id","nom","prenom","telephone","addresse","CIN","dateNaissance"];
    protected $primaryKey="id_admin";




    public function annance(){
        return $this->hasMany(annance::class,'id_annance');
}
}
