<?php

namespace App\Models;

use App\Models\utilisateur;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    protected $fillable =["id_message","id","contenu","file"];
    protected $primaryKey="id_message";

    public function utilisateur(){
        return $this->belongsTo(utilisateur::class,'id');
}

}
