<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\CountriesTableSeeder;
use Database\Seeders\StatesTableSeeder;
use Database\Seeders\CitiesTableChunkOneSeeder;
use Database\Seeders\CitiesTableChunkTwoSeeder;
use Database\Seeders\CitiesTableChunkThreeSeeder;
use Database\Seeders\CitiesTableChunkFourSeeder;
use Database\Seeders\CitiesTableChunkFiveSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Exécute les seeders de la base de données.
     */
    public function run(): void
    {

        $this->call([
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableChunkOneSeeder::class,
            CitiesTableChunkTwoSeeder::class,
            CitiesTableChunkThreeSeeder::class,
            CitiesTableChunkFourSeeder::class,
            CitiesTableChunkFiveSeeder::class,
        ]);

        // Création de 10 utilisateurs fictifs
        // User::factory(10)->create();

        // Création d'un utilisateur spécifique
        // User::factory()->create([
        //     'name' => 'Utilisateur Test',
        //     'email' => 'test@example.com',
        // ]);
    }
}
