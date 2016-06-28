<?php

namespace App\Repositories\Eloquents;

use App\Models\WeighbridgeStation as Station;

use App\Models\StationLocation as Location;

use Carbon\Carbon;


class StationRepository {

  public function getAll() {

    return Station::with('location')->paginate(10);

  }

  public function create($data) {

		$station = Station::create([

			'name' => $data['name'],
      'status' => 'working',
      'station_number' => Carbon::now()->year+Carbon::now()->second.strtoupper(str_random(6)),

			]);

      /*
       * Get id of newly created StationRepository
       */
    $id = $station->id;

    $this->attachLocation($id, $data['district']);

    return true;

	}

  public function update($data) {
    $station = Station::find($data['id']);
    /*
		 * Update Company
		 */
		$station->name = $data['name'];

    $station->save();

    /*
		 * Update location
		 */
		$this->updateLocation($data['id'], $data['district']);

    return true;
  }

  public function attachLocation($station_id, $district_id) {

		Location::create([
			'station_id' => $station_id,
			'district_id' => $district_id
		]);
  }

  public function updateLocation($station_id, $district_id) {
		Location::where('station_id', $station_id)
										->update(['district_id' => $district_id]);
	}
}
