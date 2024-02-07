<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="achats";
    protected $primaryKey = "IdAchat";
    protected $fillable = [
        'IdOuvrage', 'DateAchat', 'Quantite', 'CoutTotal'
    ];
}
