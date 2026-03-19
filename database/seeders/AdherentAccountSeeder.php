<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdherentAccountSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ADHERENT')->upsert([
            [
                'ADH_ID' => 9001,
                'CLU_ID' => 1,
                'DIS_ID' => 1,
                'ADH_NOM' => 'admin',
                'ADH_PRENOM' => 'Plateforme',
                'ADH_EMAIL' => 'admin@assosport.test',
                'ADH_HASH_PWD' => Hash::make('admin'),
                'ADH_ROLE' => 1,
                'ADH_DDN' => null,
                'ADH_ADRESSE' => 'Nice',
            ],
            [
                'ADH_ID' => 9002,
                'CLU_ID' => 2,
                'DIS_ID' => 2,
                'ADH_NOM' => 'visiteur',
                'ADH_PRENOM' => 'Simple',
                'ADH_EMAIL' => 'visiteur@assosport.test',
                'ADH_HASH_PWD' => Hash::make('Visiteur1234'),
                'ADH_ROLE' => 0,
                'ADH_DDN' => null,
                'ADH_ADRESSE' => 'Nice',
            ],
        ], ['ADH_ID'], ['CLU_ID', 'DIS_ID', 'ADH_NOM', 'ADH_PRENOM', 'ADH_EMAIL', 'ADH_HASH_PWD', 'ADH_ROLE', 'ADH_DDN', 'ADH_ADRESSE']);
    }
}
