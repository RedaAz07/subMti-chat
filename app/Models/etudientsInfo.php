<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudientsInfo extends Model
{
    use HasFactory;
    protected $fillabel =["nom","prenom","date","dateNaissance"];
}
