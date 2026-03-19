<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplineSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('DISCIPLINE')->upsert([
            ['DIS_ID' => 'Foo', 'DIS_NOM' => 'Football'],
            ['DIS_ID' => 'Bas', 'DIS_NOM' => 'Basketball'],
            ['DIS_ID' => 'Nat', 'DIS_NOM' => 'Natation'],
            ['DIS_ID' => 'Ath', 'DIS_NOM' => 'Athletisme'],
            ['DIS_ID' => 'Vol', 'DIS_NOM' => 'Volley'],
            ['DIS_ID' => 'Ten', 'DIS_NOM' => 'Tennis'],
            ['DIS_ID' => 'Jud', 'DIS_NOM' => 'Judo'],
            ['DIS_ID' => 'Bad', 'DIS_NOM' => 'Badminton'],
            ['DIS_ID' => 'Rug', 'DIS_NOM' => 'Rugby'],
            ['DIS_ID' => 'Gym', 'DIS_NOM' => 'Gymnastique'],
        ], ['DIS_ID'], ['DIS_NOM']);
    }
}
