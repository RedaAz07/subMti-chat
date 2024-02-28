<?php

namespace App\Models;

use App\Models\groupe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formateur extends Model
{
    use HasFactory;
    protected $fillable =["id_utilisateur","nom","prenom","telephone","addresse"];
    protected $primaryKey="id_formateur";

    public function groupe(){
        return $this->hasMany(groupe::class,'id_groupe');
    }
}
