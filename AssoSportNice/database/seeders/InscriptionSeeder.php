<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InscriptionSeeder extends Seeder
{
    public function run()
    {
        $ins = [
            ['INS_NUM'=>'ins1','ADH_ID'=>'adh1','COM_ID'=>'com1','INS_DATE'=>'2026-03-01','INS_ETAT'=>1],
            ['INS_NUM'=>'ins2','ADH_ID'=>'adh2','COM_ID'=>'com1','INS_DATE'=>'2026-03-02','INS_ETAT'=>0],
            ['INS_NUM'=>'ins3','ADH_ID'=>'adh3','COM_ID'=>'com2','INS_DATE'=>'2026-03-05','INS_ETAT'=>1],
            ['INS_NUM'=>'ins4','ADH_ID'=>'adh4','COM_ID'=>'com2','INS_DATE'=>'2026-03-06','INS_ETAT'=>1],
            ['INS_NUM'=>'ins5','ADH_ID'=>'adh5','COM_ID'=>'com3','INS_DATE'=>'2026-03-10','INS_ETAT'=>0],
            ['INS_NUM'=>'ins6','ADH_ID'=>'adh6','COM_ID'=>'com3','INS_DATE'=>'2026-03-12','INS_ETAT'=>1],
            ['INS_NUM'=>'ins7','ADH_ID'=>'adh7','COM_ID'=>'com4','INS_DATE'=>'2026-03-15','INS_ETAT'=>1],
            ['INS_NUM'=>'ins8','ADH_ID'=>'adh8','COM_ID'=>'com5','INS_DATE'=>'2026-03-18','INS_ETAT'=>0],
            ['INS_NUM'=>'ins9','ADH_ID'=>'adh9','COM_ID'=>'com6','INS_DATE'=>'2026-03-20','INS_ETAT'=>1],
            ['INS_NUM'=>'ins10','ADH_ID'=>'adh10','COM_ID'=>'com7','INS_DATE'=>'2026-03-22','INS_ETAT'=>0],
        ];

        DB::table('INSCRIPTION')->insert($ins);
    }
}
