<?php

namespace App\Models;

use App\Models\message;
use App\Models\etudient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class utilisateur extends Model
{
    use HasFactory;


    protected $fillable =["email","password","newPassword","type","id_admin","id_formateur","id_etudient"];


    public function getAuthIdentifier()
    {
        return $this->email; // Replace with the appropriate column name
    }


    public function message(){
        return $this->hasMany(message::class,'id_message');
}


public function etudiant()
{
    return $this->hasOne(etudient::class, 'id_etudient');
}


}
