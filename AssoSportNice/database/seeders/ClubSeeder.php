<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    public function run()
    {
        $clubs = [
            ['CLU_ID'=>'clu1','CLU_NOM'=>'AS Nice Football','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Rue de France','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'contact@asnicefoot.fr','CLU_TELFIXE'=>'04921234'],
            ['CLU_ID'=>'clu2','CLU_NOM'=>'Nice Basket Club','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Avenue Jean Médecin','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'contact@nbc.fr','CLU_TELFIXE'=>'04929876'],
            ['CLU_ID'=>'clu3','CLU_NOM'=>'AS Natation Nice','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Boulevard Gambetta','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'natation@nice.fr','CLU_TELFIXE'=>'04923456'],
            ['CLU_ID'=>'clu4','CLU_NOM'=>'Nice Athlétisme','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Rue Masséna','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'athle@nice.fr','CLU_TELFIXE'=>'04925678'],
            ['CLU_ID'=>'clu5','CLU_NOM'=>'Volley Nice','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Rue de l\'Eglise','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'volley@nice.fr','CLU_TELFIXE'=>'04921239'],
            ['CLU_ID'=>'clu6','CLU_NOM'=>'Tennis Club Nice','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Allée des Jardins','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'tennis@nice.fr','CLU_TELFIXE'=>'04927654'],
            ['CLU_ID'=>'clu7','CLU_NOM'=>'AS Judo Nice','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Rue du Temple','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'judo@nice.fr','CLU_TELFIXE'=>'04921239'],
            ['CLU_ID'=>'clu8','CLU_NOM'=>'Badminton Nice','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Boulevard Carabacel','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'badminton@nice.fr','CLU_TELFIXE'=>'04923459'],
            ['CLU_ID'=>'clu9','CLU_NOM'=>'Rugby Nice','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Rue de la Buffa','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'rugby@nice.fr','CLU_TELFIXE'=>'04927896'],
            ['CLU_ID'=>'clu10','CLU_NOM'=>'AS Gym Nice','CLU_ADRESSEVILLE'=>'Nice','CLU_ADRESSERUE'=>'Rue Bonaparte','CLU_ADRESSECP'=>'06000','CLU_MAIL'=>'gym@nice.fr','CLU_TELFIXE'=>'04921230'],
        ];

        DB::table('CLUB')->insert($clubs);
    }
}
