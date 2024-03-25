<?php

namespace App\Models;

use App\Models\classe;
use App\Models\groupe;
use App\Models\utilisateur;
use app\models\message_groupe;
use App\Models\messageformateur;
use App\Models\adminProfMessages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function messageformateur(){
        return $this->hasMany(messageformateur::class,'id');
}

public function adminProfMessages(){
    return $this->hasMany(adminProfMessages::class,'id');
}








}
