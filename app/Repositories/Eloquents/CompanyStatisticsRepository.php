<?php

namespace App\Repositories\Eloquents;

use App\Models\TruckMeasuredData as Data;

use App\Models\Company;

use Carbon\Carbon;

use Request;

class CompanyStatisticsRepository {

  public function statistics($year, $month) {
    $companies = Company::get();
    $total = Data::totalOverloaded($year, $month)->first()->total;
    $time = [
      'year' => $year,
      'month' => $month,
    ];
    $stat = [];
    $i = 0;
    foreach ($companies as $value) {
      if(Data::companyIdExist($value->id, $year, $month)->first()) {
        $stat[$i] = [
          'name' => $value->name,
          'weighed' => $this->weighed($value->id, $year, $month),
          'overloaded' => $this->overloaded($value->id, $year, $month),
          'percentOverload' => $this->percentOverload($value->id, $total, $year, $month),
          'status' => $this->status($this->percentOverload($value->id, $total, $year, $month))
        ];
        $i++;
      }
    }

    $data = [
      'time' => $time,
      'data' => $stat,
    ];

    return $data;
  }

  public function statisticsByCompany($id, $year, $month) {
    $total = Data::totalOverloaded($year, $month)->first()->total;

    $data = [
      'weighed' => $this->weighed($id, $year, $month),
      'overloaded' => $this->overloaded($id, $year, $month),
      'percentOverload' => $this->percentOverload($id, $total, $year, $month),
      'status' => $this->status($this->percentOverload($id, $total, $year, $month))
    ];

    return $data;

  }

  public function weighed($id, $year, $month) {
    $weighed = Data::weighed($id, $year, $month)->first();
    if($weighed) {
      return $weighed->weighed;
    }
    return 0;
  }

  public function overloaded($id, $year, $month) {
    $overloaded = Data::overloaded($id,$year, $month)->first();
    if($overloaded) {
      return $overloaded->overloaded;
    }
    return 0;
  }

  public function percentOverload($id, $total, $year, $month) {

    if ($total > 0) {
      return round(($this->overloaded($id, $year, $month)/$total)*100, 2);
    }
    return 0;
  }

  public function status($percent) {
    if($percent >= 35) {
      return 'extreme';
    }

    return 'fair';
  }

}
