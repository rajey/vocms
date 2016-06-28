<?php

namespace App\Http\Controllers;

use App\Repositories\AppClasses\CompanyStatistics as Statistics;

use Illuminate\Http\Request;

use App\Http\Requests;

use Response;

use Carbon\Carbon;

class CompanyStatisticsController extends Controller
{
    protected $statistics;
    protected $request;

    public function __construct(Statistics $statistics, Request $request) {
      $this->statistics = $statistics;
      $this->request = $request;
    }

    public function get() {
      if($this->request->ajax()) {
        $year = $this->request->get('year');
        $month = $this->request->get('month');
        return Response::json($this->statistics->getStatistics($year, $month));

      }

      return $this->statistics->getStatistics($year = Carbon::now()->year, $month = Carbon::now()->month);
    }

    public function getOne($id) {
      return $this->statistics->getStatisticsByCompany($id, $year = Carbon::now()->year, $month = Carbon::now()->month);
    }
}
