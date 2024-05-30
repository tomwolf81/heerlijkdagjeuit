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
            'titel' => 'Voorbeeld Titel',
            'beschrijving' => $this->faker->paragraph,
            'name' => $this->faker->sentence,
            'buiten' => $this->faker->boolean,
            'minder_validen' => $this->faker->boolean,
            'restaurant_aanwezig' => $this->faker->boolean,
            'datum' => $this->faker->date
        ];
    }
}
