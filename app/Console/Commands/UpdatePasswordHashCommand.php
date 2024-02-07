<?php

namespace App\Console\Commands;

use App\Models\Gestionnaire;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class PasswordHashUpdateCommand extends Command
{
    public function handle()
    {
        $gestionnaires = Gestionnaire::all();

        foreach ($gestionnaires as $gestionnaire) {
            // Vérifier si le mot de passe n'est pas déjà haché avec Bcrypt
            if (!Hash::needsRehash($gestionnaire->MotDePasse)) {
                $gestionnaire->MotDePasse = Hash::make($gestionnaire->MotDePasse);
                $gestionnaire->save();
            }
        }

        echo 'Mots de passe mis à jour avec succès.';
    }
}
