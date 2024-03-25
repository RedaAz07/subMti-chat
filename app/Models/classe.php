<?php

namespace App\Models;

use App\Models\niveau;
use App\Models\filiere;
use App\Models\etudient;
use App\Models\formateur;
use App\Models\messageClasse;
use App\Models\classeFormMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class classe extends Model
{
    use HasFactory;
    protected $fillable =["num_groupe","id_niveau","id_filiere"];
    protected $primaryKey="id_classe";



    public function niveau(){
        return $this->belongsTo(niveau::class,'id_niveau');
}


public function formateur()
{
    return $this->belongsToMany(formateur::class, 'classe_formateur', 'id_classe', 'id_formateur','id_classe','id_formateur');
}





public function filiere(){
    return $this->belongsTo(filiere::class,'id_filiere');
}

public function etudient(){
    return $this->hasMany(etudient::class,'id_etudient');
}


public function messageClasses(){
    return $this->hasMany(messageClasse::class,'id');
}





public function classeFormMessage(){
    return $this->hasMany(classeFormMessage::class,'id');
}






}
