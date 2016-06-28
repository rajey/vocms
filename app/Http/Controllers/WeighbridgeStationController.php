<?php

namespace App\Http\Controllers;

use App\Repositories\AppClasses\Stations as Station;

use App\Http\Controllers\RegionController as Region;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class WeighbridgeStationController extends Controller
{

    protected $station;
    protected $request;

    public function __construct(Station $station, Request $request) {
      $this->station = $station;
      $this->request = $request;
    }

    public function index(Region $region)
    {

        $stations = $this->station->getAllStations();

        //Get list of all regions
        $regions = $region->getAll();

        return view('weighbridge.index', compact('stations', 'regions'));
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
        return $this->station->validateAndStore($this->request->all(), 'create');
    }

    /**
     * Display the specified resourc.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
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
      return $this->station->validateAndStore($this->request->all(), 'update');
        
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
}
