<?php

namespace App\Models;

use App\Models\admin;
use App\Models\formateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class adminProfMessages extends Model
{
    protected $fillable = ['contenu', 'file', 'id_admin', 'id_formateur'];
    protected $table = 'admin_prof_messages';
    use HasFactory;



    public function formateur(){
        return $this->belongsTo(formateur::class,'id_formateur');
}


public function admin(){
    return $this->belongsTo(admin::class,'id_admin');
}
}
