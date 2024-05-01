<?php

namespace App\Imports;

use App\Models\classe;
use App\Models\etudient;
use App\Models\filiere;
use App\Models\niveau;
use App\Models\User;
use App\Models\utilisateur;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class etudientImport implements ToModel
{
    protected $exportData = [];

    public function model(array $row)
    {
        // Rechercher l'ID de la filière en fonction du nom de filière
        $filiere = filiere::where('nom_filiere', $row[7])->first();
        $id_filiere = $filiere ? $filiere->id_filiere : null;

        // Si la filière n'est pas trouvée, vous pouvez gérer cela selon vos besoins (ignorer l'étudiant, enregistrer une erreur, etc.)
        if (! $id_filiere) {
            return null;
        }

        // Rechercher l'ID du niveau correspondant à la filière
        $niveau = niveau::where('id_filiere', $id_filiere)->where('niveau', $row[8])->first();
        $id_niveau = $niveau ? $niveau->id_niveau : null;

        // Si le niveau n'est pas trouvé, vous pouvez également gérer cela selon vos besoins
        if (! $id_niveau) {
            return null;
        }

        // Rechercher l'ID de la classe correspondant au nom_groupe
        $classe = classe::where('id_niveau', $id_niveau)->where('num_groupe', $row[6])->first();
        $id_classe = $classe ? $classe->id_classe : null;

        // Si la classe n'est pas trouvée, vous pouvez également gérer cela selon vos besoins
        if (! $id_classe) {
            return null;
        }

        // Créer une adresse e-mail spécifique pour l'utilisateur
        $email = strtolower($row[0].'.'.$row[3].'@supMti.com'); // Exemple d'adresse e-mail : nom.prenom@supMti.com

        // Générer un mot de passe aléatoire
        $password = $row[0].$row[1].rand(1, 10); // Exemple de mot de passe : nomCIN123

        // Créer un nouvel utilisateur
        $user = new utilisateur([
            'name' => $row[0], // Supposons que le nom de l'étudiant est dans la première colonne
            'email' => $email,
            'newPassword' => $password,
            'password' => Hash::make($password),
            'type' => 'etudient',
        ]);
        $user->save();

        // Ajouter les données pour l'export
        $this->exportData[] = [
            'email' => $email,
            'password' => $password,
            'nom' => $row[0],
            'CIN' => $row[1],
            'prenom' => $row[3],
        ];

        // Créer un nouvel étudiant
        return new etudient([
            'id' => $user->id,
            'nom' => $row[0],
            'CIN' => $row[1],
            'dateNaissance' => $row[2],
            'prenom' => $row[3],
            'telephone' => $row[4],
            'addresse' => $row[5],
            'nom_groupe' => $row[6],
            'id_classe' => $id_classe,
            'nom_filiere' => $row[7],
            'niveau' => $row[8],
            // Ajoutez d'autres colonnes de votre fichier Excel ici
        ]);
    }
}
