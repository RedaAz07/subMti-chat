<?php

namespace App\Imports;

use App\Models\classe;
use App\Models\niveau;
use App\Models\person;
use App\Models\filiere;
use App\Models\etudient;
use App\Models\utilisateur;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class user implements ToCollection , WithHeadingRow
{
 public $exportData =[];
/**
 * @param Collection $collection


    */
    public function collection(Collection $rows)
    {
     foreach($rows as $row){

//dd($row["date"]);
        $idcls = classe::where("num_groupe", $row["classe"])->first();
        $idnv = niveau::where("niveau", $row["niveau"])->first();
        $idflr = filiere::where("nom_filiere", $row["filiere"])->first();

        $nvv=niveau::where("id_filiere", $idflr->id_filiere)->where("niveau",$idnv->niveau)->first();


        $clsss=classe::where("id_niveau", $nvv->id_niveau)->where("num_groupe",$idcls->num_groupe)->first();




//dd($clsss->id_classe);


$password = $row["nom"] . $row["cin"] . rand(100, 999);
$hashedPassword=Hash::make($password);
        $utilisateur = utilisateur::create([
            "email" => $row["nom"] . $row["prenom"] . "@subMti.com",
            "password" => $hashedPassword, // Store hashed password
            "type" => "etudient",
            "newPassword" => $password,

        ]);

//dd($row["date"]);
        $excel_date = $row["date"]; //Your row line date that is : 3/17/2022
        $uniq_date = ($excel_date - 25569) * 86400;
        $date = gmdate('Y-m-d H:i:s', $uniq_date);




etudient::create([
    "id" => $utilisateur->id,
    "nom"=>$row["nom"],
    "CIN"=>$row["cin"],
    "dateNaissance"=>$date,
    "prenom"=>$row["prenom"],
    "telephone"=>$row["telephone"],
    "addresse"=>$row["addresse"],
    "id_classe"=>$clsss->id_classe,



    ]);


     };

    }



}
