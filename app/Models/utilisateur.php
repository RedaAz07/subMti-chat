<?php

namespace App\Models;

use App\Models\message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    use HasFactory;


    protected $fillable =["id_utilisatuer","email","password","newPassword","type","id_admin","id_formateur","id_etudient"];
    protected $primaryKey="id_utilisatuer";

    public function message(){
        return $this->hasMany(message::class,'message_id');
}


}
