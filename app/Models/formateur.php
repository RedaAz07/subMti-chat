<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formateur extends Model
{
    use HasFactory;
    protected $fillable =["id_formateur","nom","prenom","telephone","addresse"];
    protected $primaryKey="id_formateur";
}
