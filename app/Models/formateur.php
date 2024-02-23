<?php

namespace App\Models;

use App\Models\groupe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formateur extends Model
{
    use HasFactory;
    protected $fillable =["id_formateur","nom","prenom","telephone","addresse"];
    protected $primaryKey="id_formateur";
    public $incrementing = true ;

    public function groupe(){
        return $this->hasMany(groupe::class,'groupe_id');
    }
}
