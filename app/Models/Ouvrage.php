<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OuvrageFactory;

class Ouvrage extends Model
{
    public $timestamps = false;
    protected $table="ouvrages";
    protected $primaryKey = "Id";
    protected $fillable = [
        'Titre', 'Auteur', 'Editeur', 'Prix',  'AnneePublication', 'Statut'
    ];
    public static function factory()
    {
        return new OuvrageFactory();
    }
}
