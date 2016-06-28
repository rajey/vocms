<?php

namespace App\Http\Controllers;

use App\Repositories\AppClasses\Trucks;

use App\Http\Controllers\CompanyContoller as Company;

use App\Http\Requests;

use Validator;

use Request;

class TruckController extends Controller
{
    protected $trucks;
    protected $request;

    public function __construct(Trucks $trucks, Request $request) {

        $this->trucks = $trucks;
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        return $this->trucks->validateAndStore($this->request::all(), 'create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /*
      * Get list of trucks by calling TruckCompanyController method
      */
      $trucks = $this->trucks->getCompanyTrucks($id);

      return view('truck.show')->with(['trucks' => $trucks]);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return $this->trucks->validateAndStore($this->request::all(), 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTrucksByCompany($company_id) {
      return $this->trucks->trucksByCompany($company_id);
    }

}
