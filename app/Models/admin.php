<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $fillable =["id_admin","nom","prenom","telephone","addresse"];
    protected $primaryKey="id_admin";

}
