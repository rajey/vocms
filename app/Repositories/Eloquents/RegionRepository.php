<?php

namespace App\Repositories\Eloquents;

use App\Models\Region;

class RegionRepository {

  public function getAll() {
    return Region::all();
  }

  public function getDistricts($id) {

    return Region::find($id)->districts;
  }
}
