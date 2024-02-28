<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class EncryptPasswords extends Command
{
    protected $signature = 'encrypt:passwords';

    protected $description = 'Encrypt all passwords in the utilisateur table';

    public function handle()
    {
        $utilisateurs = DB::table('utilisateurs')->get();

        foreach ($utilisateurs as $utilisateur) {
            $encryptedPassword = Crypt::encrypt($utilisateur->password);

            DB::table('utilisateurs')
                ->where('id_utilisateur', $utilisateur->id_utilisateur)
                ->update(['password' => $encryptedPassword]);
        }

        $this->info('All passwords encrypted successfully.');
    }
}
