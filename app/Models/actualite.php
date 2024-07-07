<?php

namespace App\Models;

use App\Models\admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actualite extends Model
{
    protected $primaryKey="id_actualite";

    use HasFactory;
    protected $fillable = ["id_admin","contenu","file"];


    public function admin(){
        return $this->belongsTo(admin::class,'id_admin');
}
}
