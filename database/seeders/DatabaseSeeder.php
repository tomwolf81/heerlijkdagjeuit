<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Dagjeuit;
use App\Models\Categorie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Maak 6 Categorie records aan
        $categories = Categorie::factory()->count(6)->create();

        // Maak 10 Dagjeuit records aan
        $dagjeuits = Dagjeuit::factory()->count(10)->create();

        // Voeg elke categorie toe aan elk Dagjeuit record
        foreach ($dagjeuits as $dagjeuit) {
            $dagjeuit->categories()->attach($categories->random());
            
            // Genereer een URL voor de opgeslagen afbeelding
            $dagjeuit->url = Storage::url('public/images/default.png'); // Pas de standaardafbeelding aan indien nodig
            $dagjeuit->save();
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
