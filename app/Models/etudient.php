<?php

namespace App\Models;

use App\Models\groupe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudient extends Model
{
    use HasFactory;
    public $incrementing = true ;
    protected $fillable =["id_etudient","nom","prenom","telephone","addresse","CIN","dateNaissance"];
    protected $primaryKey="id_etudient";


    public function groupe(){
        return $this->belongsTo(groupe::class,'groupe_id');
}

}
