<?php

namespace App\Repositories\Eloquents;

use App\Models\TruckConfiguration;

class ConfigRepository {

	public function create($data) {

		return TruckConfiguration::create([

			'configuration' => $data['configuration'],
			'gross_mass' => $data['gvm'],

			]);
	}

	public function update($data) {
		$config = TruckConfiguration::find($data['id']);

		$config->configuration = $data['configuration'];
		$config->gross_mass = $data['gvm'];
		$config->save();

		return true;
	}

	public function get($page) {

		if($page == 'all') {

			return TruckConfiguration::select('id', 'configuration')->get();

		} else return TruckConfiguration::paginate($page);


	}

}
