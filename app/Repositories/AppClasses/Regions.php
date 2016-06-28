<?php

namespace App\Repositories\AppClasses;

use App\Repositories\Eloquents\RegionRepository as Region;

class Regions {

  protected $region;

  public function __construct(Region $region) {
    $this->region = $region;
  }

  public function getAllRegions() {

     return $this->region->getAll();
  }

  public function getDistrictsList($id) {

    return $this->region->getDistricts($id);
  }
}
