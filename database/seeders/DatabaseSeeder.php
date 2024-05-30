<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dagjeuit;
use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Database\Seeders\DagjeuitsTableSeeder;
use Database\Seeders\CategoriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   
        public function run()
    {
        // Maak 10 Dagjeuit records aan
        $dagjeuits = Dagjeuit::factory()->count(10)->create();

        // Maak 6 Categorie records aan
        $categories = Categorie::factory()->count(6)->create();

        // Voeg elke categorie toe aan elk Dagjeuit record
        foreach ($dagjeuits as $dagjeuit) {
            $dagjeuit->categories()->attach($categories->random());
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',

        ]);
    }
}
