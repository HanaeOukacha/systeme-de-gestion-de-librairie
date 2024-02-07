<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Gestionnaire extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = "gestionnaires";
    protected $primaryKey = "Id";
    protected $fillable = [
         'Nom', 'Prenom', 'Email', 'MotDePasse'
    ];
    protected $hidden = [
        'MotDePasse',
    ];
    public function getAuthIdentifierName()
    {
        return 'Id'; // Replace 'Id' with your actual identifier column name
    }


}
