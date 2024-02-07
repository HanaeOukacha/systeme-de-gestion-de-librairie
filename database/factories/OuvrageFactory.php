<?php

use App\Models\Ouvrage;
use Illuminate\Database\Eloquent\Factories\Factory;

class OuvrageFactory extends Factory
{
    protected $model = Ouvrage::class;

    public function definition()
    {
        return [
            'Titre' => $this->faker->sentence,
            'Auteur' => $this->faker->name,
            'Editeur' => $this->faker->company,
            'Prix' => $this->faker->randomFloat(2, 0, 100),
            'AnneePublication' => $this->faker->year,
            'Statut' => $this->faker->randomElement(['disponible', 'non disponible']),
        ];
    }
}
