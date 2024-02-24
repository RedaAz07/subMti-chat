<?php

namespace App\Models;

use App\Models\etudient;
use App\Models\filiere;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class groupe extends Model
{
    use HasFactory;
    protected $fillable =["id_groupe","id_filiere","num_groupe"];
    protected $primaryKey="id_groupe";

    public function filiere(){
        return $this->belongsTo(filiere::class,'filiere_id');
}



public function etudient(){
    return $this->hasMany(etudient::class,'etudient_id');
}

public function formateur(){
    return $this->hasMany(formateur::class,'formateur_id');
}
}
