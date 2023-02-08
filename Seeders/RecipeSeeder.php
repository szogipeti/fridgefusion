<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CsapatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("csapat")->insert(
            [
				['id' => '1','nev' => 'Alma leves','method' => '
    1. Az almát megpucoljuk, kockára vágjuk.
    2. Egy lábasba tesszük, felöntjük annyi vízzel, amennyi ellepi. Hozzáadjuk a cukrot, a fahéjat, a szegfűszeget, és belereszeljük a citromhéjat.
    3. 15 percig főzzük, míg az alma nagyjából megpuhul.
    4. Közben a tejfölt kikeverjük a liszttel, és hozzámerünk egy merőkanálnyi főzővizet, majd csomómentesre keverjük.
    5. Visszaöntjük a levesbe, és még 5 percig főzzük.
','category' => 'Leves','Publisher' => 'Kiss Imre'],			
              ]
                
        );
    }
}
