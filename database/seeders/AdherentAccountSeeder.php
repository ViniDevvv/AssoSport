<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdherentAccountSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ADHERENT')->updateOrInsert(
            ['ADH_ID' => 9001],
            [
                'CLU_ID' => 1,
                'DIS_ID' => 1,
                'ADH_NOM' => 'admin',
                'ADH_PRENOM' => 'Plateforme',
                'ADH_EMAIL' => 'admin@assosport.test',
                'ADH_HASH_PWD' => Hash::make('admin'),
                'ADH_ROLE' => 1,
                'ADH_DDN' => null,
                'ADH_ADRESSE' => 'Nice',
            ]
        );

        DB::table('ADHERENT')->updateOrInsert(
            ['ADH_ID' => 9002],
            [
                'CLU_ID' => 2,
                'DIS_ID' => 2,
                'ADH_NOM' => 'adherent',
                'ADH_PRENOM' => 'Simple',
                'ADH_EMAIL' => 'adherent@assosport.test',
                'ADH_HASH_PWD' => Hash::make('adherent'),
                'ADH_ROLE' => 0,
                'ADH_DDN' => null,
                'ADH_ADRESSE' => 'Nice',
            ]
        );
    }
}
