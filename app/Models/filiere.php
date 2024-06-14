<?php

namespace App\Models;

use App\Models\groupe;
use App\Models\niveau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class filiere extends Model
{
    use HasFactory;
    protected $fillable =["nom_filiere"];
    protected $primaryKey="id_filiere";



    public function niveau()
    {
        return $this->hasMany(niveau::class, 'id_niveau')
           ;
    }
}
