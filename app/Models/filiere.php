<?php

namespace App\Models;

use App\Models\groupe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
    use HasFactory;
    protected $fillable =["id_filiere","id_formateur","id_etudient","nom_filiere"];
    protected $primaryKey="id_filiere";

    public function groupe(){
        return $this->hasMany(groupe::class,'groupe_id');
}
}
