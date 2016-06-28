<?php

namespace App\Http\Controllers;

use App\Repositories\AppClasses\WeighbridgeReports as Reports;

use Illuminate\Http\Request;

use App\Http\Requests;

use Response;

class WeighbridgeReportController extends Controller
{

    protected $report;
    public function __construct(Reports $report) {
      $this->report = $report;
    }

    public function get($id, $year) {
      return Response::json($this->report->getReport($id, $year));
    }
}
