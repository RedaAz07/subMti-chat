<?php

namespace App\Models;

use App\Models\classe;
use App\Models\groupe;
<<<<<<< HEAD
use app\models\message_groupe;
use App\Models\utilisateur;
=======
use App\Models\utilisateur;
use app\models\message_groupe;
use App\Models\messageformateur;
use App\Models\adminProfMessages;
use Illuminate\Database\Eloquent\Model;
>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
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



<<<<<<< HEAD
=======
    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'id');
    }





    public function messageformateur(){
        return $this->hasMany(messageformateur::class,'id');
}






public function adminProfMessages(){
    return $this->hasMany(adminProfMessages::class,'id');
}








>>>>>>> d468491c8ae6fa6832ad2f5b04819c4ec1ac580c
}
