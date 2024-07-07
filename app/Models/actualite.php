<?php

namespace App\Models;

use App\Models\admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actualite extends Model
{
    use HasFactory;
    protected $fillable = ["id_admin","contenu","file"];

    protected $primaryKey="id_actualite";

    public function admin(){
        return $this->belongsTo(admin::class,'id_admin');
}
}
