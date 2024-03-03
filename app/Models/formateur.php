<?php

namespace App\Models;

use App\Models\classe;
use App\Models\groupe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class formateur extends Model
{
    use HasFactory;
    protected $fillable =["id","nom","prenom","telephone","addresse","dateNaissance","CIN"];
    protected $primaryKey="id_formateur";



    public function classes()
    {
        return $this->belongsToMany(classe::class, 'classe_formateur', 'id_formateur', 'id_classe','id_formateur','id_classe');
    }

}
