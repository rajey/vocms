<?php

use Illuminate\Database\Seeder;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configuration = [
       		1 => [
       			'configuration' => '1.1',
       			'gross_mass' => 16
       		],

       		2 => [
       			'configuration' => '1.2',
       			'gross_mass' => 18
       		],

       		3 => [
       			'configuration' => '1.11',
       			'gross_mass' => 20
       		],

       		4 => [
       			'configuration' => '1.22',
       			'gross_mass' => 26
       		],

       		5 => [
       			'configuration' => '1.21',
       			'gross_mass' => 23
       		],

       		6 => [
       			'configuration' => '1.2-2',
       			'gross_mass' => 28
       		],

       		7 => [
       			'configuration' => '1.2-1',
       			'gross_mass' => 26
       		],

       		8 => [
       			'configuration' => '1.1-1',
       			'gross_mass' => 24
       		],

       		9 => [
       			'configuration' => '1.1-2',
       			'gross_mass' => 26
       		],

       		10 => [
       			'configuration' => '1.1-22',
       			'gross_mass' => 34
       		],

       		11 => [
       			'configuration' => '1.22-2',
       			'gross_mass' => 36
       		],

       		12 => [
       			'configuration' => '1.21-2',
       			'gross_mass' => 33
       		],

       		13 => [
       			'configuration' => '1.2-21',
       			'gross_mass' => 33
       		],

       		14 => [
       			'configuration' => '1.2-22',
       			'gross_mass' => 36
       		],

       		15 => [
       			'configuration' => '1.1-222',
       			'gross_mass' => 40
       		],

       		16 => [
       			'configuration' => '1.1-221',
       			'gross_mass' => 37
       		],

       		17 => [
       			'configuration' => '1.22-22',
       			'gross_mass' => 44
       		],

       		18 => [
       			'configuration' => '1.21-21',
       			'gross_mass' => 38
       		],

       		19 => [
       			'configuration' => '1.22-21',
       			'gross_mass' => 41
       		],

       		21 => [
       			'configuration' => '1.22-222',
       			'gross_mass' => 50
       		],

       		22 => [
       			'configuration' => '1.22.221',
       			'gross_mass' => 47
       		],

       		23 => [
       			'configuration' => '1.22-111',
       			'gross_mass' => 41
       		],

       		24 => [
       			'configuration' => '1.21.222',
       			'gross_mass' => 47
       		],

       		25 => [
       			'configuration' => '1.21-111',
       			'gross_mass' => 38
       		],

       		26 => [
       			'configuration' => '1.21.221',
       			'gross_mass' => 44
       		],
       ];
       $count = count($configuration);

        foreach ($configuration as $value) {
        	DB::table('truck_configurations')->insert([
        		'configuration' => $value['configuration'],
        		'gross_mass' => $value['gross_mass']
        		]);
        }
    }
}
