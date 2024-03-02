<?php

namespace App\Models;

use App\Models\etudient;
use App\Models\filiere;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    use HasFactory;
    protected $fillable =["id_classe","id_filiere","num_classe"];
    protected $primaryKey="id_classe";

    public function filiere(){
        return $this->belongsTo(filiere::class,'id_filier');
}



public function etudient(){
    return $this->hasMany(etudient::class,'id_etudinet');
}

public function formateur(){
    return $this->hasMany(formateur::class,'formateur_id');
}
}
