<?php

namespace App\Repositories\AppClasses;

use App\Repositories\Eloquents\CompanyStatisticsRepository as Statistics;

class CompanyStatistics {

  protected $statistics;
  public function __construct(Statistics $statistics) {
    $this->statistics = $statistics;
  }

  public function getStatistics($year, $month) {
    return $this->statistics->statistics($year, $month);
  }

  public function getStatisticsByCompany($id, $year, $month) {
    return $this->statistics->statisticsByCompany($id, $year, $month);
  }
}
