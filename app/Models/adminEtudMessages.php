<?php

namespace App\Models;

use App\Models\admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class adminEtudMessages extends Model
{
    protected $fillable = ['contenu', 'file', 'id_admin', 'id_etudient'];
    protected $table = 'admin_etud_messages';
    use HasFactory;



    public function etudient(){
        return $this->belongsTo(etudient::class,'id_etudient');
}


public function admin(){
    return $this->belongsTo(admin::class,'id_admin');
}

}
