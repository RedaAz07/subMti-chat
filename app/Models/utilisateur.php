<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    use HasFactory;


    protected $fillable =["id_utilisatuer","email","password","newPassword","type","id_admin","id_formateur","id_etudient"];
    protected $primaryKey="id_utilisatuer";


}
