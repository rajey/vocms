<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeighbridgeStation extends Model
{
    protected $fillable = ['name', 'station_number', 'status'];

    public function location() {

      return $this->hasOne('App\Models\StationLocation', 'station_id')
                  ->select('station_id', 'district_id');
    }


    public function data() {
      return $this->belongsToMany('App\Models\TruckMeasuredData', 'measuring_stations', 'station_id', 'data_id');
    }

}
