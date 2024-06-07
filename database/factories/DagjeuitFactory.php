<?php

namespace Database\Factories;

use App\Models\Dagjeuit;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dagjeuit>
 */
class DagjeuitFactory extends Factory


{
    protected $model = Dagjeuit::class;
    public function definition()
    {
      

        return [
            'titel' => $this->faker->sentence,
            'beschrijving' => $this->faker->paragraph,
            'buiten' => $this->faker->boolean,
            'minder_validen' => $this->faker->boolean,
            'restaurant_aanwezig' => $this->faker->boolean,
            'datum' => $this->faker->date,
            'adres' => $this->faker->streetAddress,
            'postcode' => $this->faker->postcode,
            'plaats' => $this->faker->city,
            'foto' => 'images/default.png', // Pas aan naar een geldige standaardafbeelding of gebruik een uploadmechanisme
        ];
}
}