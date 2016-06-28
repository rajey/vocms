<?php

namespace App\Repositories\Eloquents;

use App\Models\TruckMeasuredData as Data;

class WeighbridgeReportRepository {

  public function report($id, $year) {
    $weighed_result = Data::weighedStation($year, $id)->get();
    $overloaded_result = Data::overloadedStation($year, $id)->get();

    $weighed = $this->recompileData($weighed_result);
    $overloaded = $this->recompileData($overloaded_result);

    $data = ['weighed' => $weighed, 'overloaded' => $overloaded];

    return $data;
  }

  public function recompileData($data) {
    $init = [0,0,0,0,0,0,0,0,0,0,0,0];

    foreach ($data as $value) {
      $count = $value['month']-1;
      $init[$count] = $value['count'];
    }

    return $init;
  }
}
