<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Response;

use App\Repositories\AppClasses\Regions;

class RegionController extends Controller {

    protected $region;

    public function __construct(Regions $region) {
      $this->region = $region;
    }

    public function getAll() {

      return $this->region->getAllRegions();
    }

    public function getDistrictsByRegionId($id) {

      $district_list = $this->region->getDistrictsList($id);

      return Response::json($district_list->toArray());

    }
}
