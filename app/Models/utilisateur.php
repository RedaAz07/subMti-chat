<?php

namespace App\Models;

use App\Models\message;
use App\Models\etudient;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class utilisateur extends Model
{
    use HasFactory;


    protected $fillable =["email","password","newPassword","type",];

    protected $primaryKey = 'id';

    public function message(){
        return $this->hasMany(message::class,'id_message');
}


public function etudient()
{
    return $this->hasOne(etudient::class, 'id_etudient');
}



public function formateur()
{
    return $this->hasOne(formateur::class, 'id_formateur');
}


public function admin()
{
    return $this->hasOne(admin::class, 'id_admin');
}

}
