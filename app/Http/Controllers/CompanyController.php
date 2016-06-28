<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AxleConfigurationController as Configuration;

use App\Http\Controllers\RegionController as Region;

use App\Http\Controllers\TruckController as Truck;

use App\Http\Controllers\CompanyStatisticsController as Statistics;

use App\Repositories\AppClasses\TruckCompanies as Company;

use App\Http\Requests;
use Illuminate\Http\Request;
use Response;


class CompanyController extends Controller {

    protected $company;
    protected $region;
    protected $request;

    public function __construct(Company $company, Region $region, Request $request) {

        $this->company = $company;
        $this->region = $region;
        $this->request = $request;
    }

    public function index(Statistics $stat) {

      /*
       * Get list of all companies
       */
      $companies = $this->company->getAllCompanies('display');

      /*
       * Get names of region for populating the form
       */
      $regions = $this->region->getAll();

      $statistics = $stat->get();

      return view('company.index', compact('companies', 'regions', 'statistics'));
    }

    public function create() {

    }

    public function store() {

        return $this->company->validateAndStore($this->request->all(), 'create');

    }

    public function show($id, Truck $trucks, Configuration $config, Statistics $stat)
    {
      $company = $this->company->companyById($id);
      /*
       * Get names of region for populating the form
       */
      $regions = $this->region->getAll();

      /*
       * Get all trucks under this company
       */
      $trucks = $trucks->getTrucksByCompany($id);

      /*
       * Get configuration list for dropdown in truck registration
       */

      $configuration = $config->getAxleConfigurations('all');

      /*
       * Get latest statistical data
       */
       $statistics = $stat->getOne($id);

       if($company) {
         return view('company.company', compact('company','trucks', 'configuration', 'regions', 'statistics'));
       }
       return redirect('/company');
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
      return $this->company->validateAndStore($this->request->all(), 'update');
    }

    public function destroy($id)
    {
        //
    }


}
