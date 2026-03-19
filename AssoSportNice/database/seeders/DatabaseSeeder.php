<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // disable foreign key checks for batch insertions
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            \Database\Seeders\ClubSeeder::class,
            \Database\Seeders\DisciplineSeeder::class,
            \Database\Seeders\AdherentSeeder::class,
            \Database\Seeders\CompetitionSeeder::class,
            \Database\Seeders\InscriptionSeeder::class,
            \Database\Seeders\DisclubSeeder::class,
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
