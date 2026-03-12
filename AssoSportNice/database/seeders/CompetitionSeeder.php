<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompetitionSeeder extends Seeder
{
    public function run()
    {
        $comps = [
            ['COM_ID'=>'com1','CLU_ID'=>'clu1','DIS_ID'=>'Foo','CLU_ID_LOCAL'=>'clu2','COM_NOM'=>'Coupe de Football 2026','COM_DATE'=>'2026-04-15'],
            ['COM_ID'=>'com2','CLU_ID'=>'clu2','DIS_ID'=>'Bas','CLU_ID_LOCAL'=>'clu3','COM_NOM'=>'Basket Challenge 2026','COM_DATE'=>'2026-05-10'],
            ['COM_ID'=>'com3','CLU_ID'=>'clu3','DIS_ID'=>'Nat','CLU_ID_LOCAL'=>'clu4','COM_NOM'=>'Natation Open 2026','COM_DATE'=>'2026-06-05'],
            ['COM_ID'=>'com4','CLU_ID'=>'clu4','DIS_ID'=>'Ath','CLU_ID_LOCAL'=>'clu5','COM_NOM'=>'Athlé 100m 2026','COM_DATE'=>'2026-06-20'],
            ['COM_ID'=>'com5','CLU_ID'=>'clu5','DIS_ID'=>'Vol','CLU_ID_LOCAL'=>'clu6','COM_NOM'=>'Volley Cup 2026','COM_DATE'=>'2026-07-10'],
            ['COM_ID'=>'com6','CLU_ID'=>'clu6','DIS_ID'=>'Ten','CLU_ID_LOCAL'=>'clu7','COM_NOM'=>'Tennis Masters 2026','COM_DATE'=>'2026-07-25'],
            ['COM_ID'=>'com7','CLU_ID'=>'clu7','DIS_ID'=>'Jud','CLU_ID_LOCAL'=>'clu8','COM_NOM'=>'Tournoi Judo 2026','COM_DATE'=>'2026-08-15'],
            ['COM_ID'=>'com8','CLU_ID'=>'clu8','DIS_ID'=>'Bad','CLU_ID_LOCAL'=>'clu9','COM_NOM'=>'Badminton Open 2026','COM_DATE'=>'2026-08-30'],
            ['COM_ID'=>'com9','CLU_ID'=>'clu9','DIS_ID'=>'Rug','CLU_ID_LOCAL'=>'clu10','COM_NOM'=>'Rugby Challenge 2026','COM_DATE'=>'2026-09-12'],
            ['COM_ID'=>'com10','CLU_ID'=>'clu10','DIS_ID'=>'Gym','CLU_ID_LOCAL'=>'clu1','COM_NOM'=>'Gymnastique Gala 2026','COM_DATE'=>'2026-09-25'],
        ];

        DB::table('COMPETITION')->insert($comps);
    }
}
