<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = array(
        	1 => 'Arusha',
        	2 => 'Dar es Salaam',
        	3 => 'Dodoma',
        	4 => 'Geita',
        	5 => 'Iringa',
        	6 => 'Kagera',
        	7 => 'Katavi',
        	8 => 'Kigoma',
        	9 => 'Kilimanjaro',
        	10 => 'Lindi',
        	11 => 'Manyara',
        	12 => 'Mara',
        	13 => 'Mbeya',
        	14 => 'Morogoro',
        	15 => 'Mtwara',
        	16 => 'Mwanza',
        	17 => 'Njombe',
        	18 => 'Pemba North',
        	19 => 'Pemba South',
        	20 => 'Pwani',
        	21 => 'Rukwa',
        	22 => 'Ruvuma',
        	23 => 'Shinyanga',
        	24 => 'Simiyu',
        	25 => 'Singida',
        	26 => 'Tabora',
        	27 => 'Tanga',
        	28 => 'Zanzibar North',
        	29 => 'Zanzibar South and Central',
        	30 => 'Zanzibar West'
        	 );
        $count = count($regions);

        for ($i = 1; $i <= $count; $i++) {
        	DB::table('regions')->insert([
        		'name' => $regions[$i],
        		]);
        }
    }
}
