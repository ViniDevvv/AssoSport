<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdherentSeeder extends Seeder
{
    public function run()
    {
        $adherents = [
            ['ADH_ID'=>'adh1','CLU_ID'=>'clu1','DIS_ID'=>'Foo','ADH_NOM'=>'Dupont','ADH_PRENOM'=>'Jean','ADH_DDN'=>'2005-02-15','ADH_ADRESSE'=>'10 rue de France'],
            ['ADH_ID'=>'adh2','CLU_ID'=>'clu1','DIS_ID'=>'Foo','ADH_NOM'=>'Martin','ADH_PRENOM'=>'Luc','ADH_DDN'=>'2006-06-20','ADH_ADRESSE'=>'12 rue de France'],
            ['ADH_ID'=>'adh3','CLU_ID'=>'clu2','DIS_ID'=>'Bas','ADH_NOM'=>'Bernard','ADH_PRENOM'=>'Sophie','ADH_DDN'=>'2004-11-05','ADH_ADRESSE'=>'5 avenue Jean Médecin'],
            ['ADH_ID'=>'adh4','CLU_ID'=>'clu2','DIS_ID'=>'Bas','ADH_NOM'=>'Durand','ADH_PRENOM'=>'Paul','ADH_DDN'=>'2005-01-22','ADH_ADRESSE'=>'8 avenue Jean Médecin'],
            ['ADH_ID'=>'adh5','CLU_ID'=>'clu3','DIS_ID'=>'Nat','ADH_NOM'=>'Petit','ADH_PRENOM'=>'Claire','ADH_DDN'=>'2006-03-12','ADH_ADRESSE'=>'20 boulevard Gambetta'],
            ['ADH_ID'=>'adh6','CLU_ID'=>'clu3','DIS_ID'=>'Nat','ADH_NOM'=>'Moreau','ADH_PRENOM'=>'Antoine','ADH_DDN'=>'2005-07-30','ADH_ADRESSE'=>'22 boulevard Gambetta'],
            ['ADH_ID'=>'adh7','CLU_ID'=>'clu4','DIS_ID'=>'Ath','ADH_NOM'=>'Leroy','ADH_PRENOM'=>'Emma','ADH_DDN'=>'2005-09-25','ADH_ADRESSE'=>'15 rue Masséna'],
            ['ADH_ID'=>'adh8','CLU_ID'=>'clu5','DIS_ID'=>'Vol','ADH_NOM'=>'Roux','ADH_PRENOM'=>'Louis','ADH_DDN'=>'2004-12-18','ADH_ADRESSE'=>'18 rue de l\'Eglise'],
            ['ADH_ID'=>'adh9','CLU_ID'=>'clu6','DIS_ID'=>'Ten','ADH_NOM'=>'Faure','ADH_PRENOM'=>'Alice','ADH_DDN'=>'2005-05-10','ADH_ADRESSE'=>'3 allée des Jardins'],
            ['ADH_ID'=>'adh10','CLU_ID'=>'clu7','DIS_ID'=>'Jud','ADH_NOM'=>'Blanc','ADH_PRENOM'=>'Thomas','ADH_DDN'=>'2006-08-08','ADH_ADRESSE'=>'7 rue du Temple'],
        ];

        DB::table('ADHERENT')->insert($adherents);
    }
}
