<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    public $timestamps = false;
    protected $table="emprunts";
    protected $primaryKey = "IdEmprunt";
    protected $fillable = [
         'IdOuvrage', 'IdAbonne', 'DateEmprunt', 'DateRetourPrevue','DateRetourReelle'
    ];
}
