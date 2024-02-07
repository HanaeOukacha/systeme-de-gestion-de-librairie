<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('gestionnaires', function (Blueprint $table) {
        $table->id();
        $table->string('Id')->unique();
        $table->string('Nom');
        $table->string('Prenom');
        $table->string('Email');
        $table->string('MotDePasse')->unique();
        // Ajoutez d'autres champs si nécessaire
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('gestionnaires');
}
};
