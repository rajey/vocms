<?php

namespace App\Repositories\AppClasses;

use App\Repositories\Eloquents\WeighbridgeReportRepository as Report;

class WeighbridgeReports {

  protected $report;
  public function __construct(Report $report) {
    $this->report = $report;
  }

  public function getReport($id, $year) {
    return $this->report->report($id, $year);
  }
}
