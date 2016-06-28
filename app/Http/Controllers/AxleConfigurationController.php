<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\AppClasses\AxleConfigurations;
use App\Models\TruckConfiguration;
use Response;

class AxleConfigurationController extends Controller
{

    protected $axle;
    protected $request;

    public function __construct(AxleConfigurations $axle, Request $request) {

        $this->axle = $axle;
        $this->request = $request;

    }

    public function index()
    {

        $configuration = TruckConfiguration::paginate(10);
        return view('configuration.index')->with(['configuration' => $configuration]);
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

        return $this->axle->validateAndStore($this->request->all(), 'create');

    }

    /**
     * Display the specified resource.
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
        return $this->axle->validateAndStore($this->request->all(), 'update');
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

    public function getAxleConfigurations() {

        return $this->axle->getConfiguration('all');
    }
}
