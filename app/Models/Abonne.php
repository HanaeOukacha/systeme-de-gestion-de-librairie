<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    public $timestamps = false;
    protected $table="abonnes";
    protected $primaryKey = "Id";
    protected $fillable = [
         'Nom', 'Prenom', 'Email', 'NumeroTelephone'
    ];
}
