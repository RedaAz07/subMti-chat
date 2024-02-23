<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudient extends Model
{
    use HasFactory;

    protected $fillable =["id_etudient","nom","prenom","telephone","addresse","CIN","dateNaissance"];
    protected $primaryKey="id_etudient";

}
