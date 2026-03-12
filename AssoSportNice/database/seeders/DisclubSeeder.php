<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisclubSeeder extends Seeder
{
    public function run()
    {
        $pairs = [
            ['CLU_ID'=>'clu1','DIS_ID'=>'Foo'],
            ['CLU_ID'=>'clu2','DIS_ID'=>'Bas'],
            ['CLU_ID'=>'clu3','DIS_ID'=>'Nat'],
            ['CLU_ID'=>'clu4','DIS_ID'=>'Ath'],
            ['CLU_ID'=>'clu5','DIS_ID'=>'Vol'],
            ['CLU_ID'=>'clu6','DIS_ID'=>'Ten'],
            ['CLU_ID'=>'clu7','DIS_ID'=>'Jud'],
            ['CLU_ID'=>'clu8','DIS_ID'=>'Bad'],
            ['CLU_ID'=>'clu9','DIS_ID'=>'Rug'],
            ['CLU_ID'=>'clu10','DIS_ID'=>'Gym'],
        ];

        DB::table('DISCLUB')->insert($pairs);
    }
}
