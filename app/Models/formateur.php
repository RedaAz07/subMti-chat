<?php

namespace App\Models;

use App\Models\classe;
use App\Models\groupe;
use app\models\message_groupe;
use App\Models\utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formateur extends Model
{
    use HasFactory;
    protected $fillable =["id","nom","prenom","telephone","addresse","dateNaissance","CIN"];
    protected $primaryKey="id_formateur";

    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'id');
    }

    public function classes()
    {
        return $this->belongsToMany(classe::class, 'classe_formateur', 'id_formateur', 'id_classe','id_formateur','id_classe');
    }



}
