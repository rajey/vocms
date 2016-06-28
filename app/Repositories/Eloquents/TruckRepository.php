<?php

namespace App\Repositories\Eloquents;

use App\Models\Truck;

class TruckRepository {

	public function create($data) {

		return Truck::create([

			'plate_number' => $data['plate_number'],
			'configuration_id' => $data['configuration'],
			'company_id' => $data['company'],
			'tag_id' => $data['tag_id']

			]);

	}

	public function update($data) {
		$truck = Truck::find($data['id']);

		$truck->plate_number = $data['plate_number'];
		$truck->configuration_id = $data['configuration'];
		$truck->tag_id = $data['tag_id'];

		$truck->save();

		return true;
	}

	/*
	 * Get all trucks for this company
	 */
	public function getTrucksByCompany($id) {

		return Truck::with('configuration')->where('company_id', $id)->paginate(10);
	}
}
