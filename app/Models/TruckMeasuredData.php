<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TruckMeasuredData extends Model
{

    protected $table = 'truck_measured_data';


    public function truck() {
      return $this->belongsTo('App\Models\Truck');
    }

    public function station() {
      return $this->belongsToMany('App\Models\WeighbridgeStation', 'measuring_stations', 'data_id', 'station_id');
    }

    public function scopeWeighedStation($query, $year, $id) {
      return $query->where('station_id', $id)
                   ->whereYear('measured_at','=', $year)
                   ->selectRaw('count(truck_id) as count, MONTH(measured_at) as month')
                   ->groupBy('month');
    }

    public function scopeOverloadedStation($query, $year, $id) {
      return $query->where('station_id', $id)
                   ->where('remarks', 'overloaded')
                   ->whereYear('measured_at','=', $year)
                   ->selectRaw('count(truck_id) as count, MONTH(measured_at) as month')
                   ->groupBy('month');
    }


    public function scopeWeighed($query, $id, $year, $month) {
      $query->join('trucks', 'truck_measured_data.truck_id', '=', 'trucks.id')
                  ->selectRaw('count(truck_measured_data.truck_id) as weighed')
                  ->where('trucks.company_id', $id)
                  ->whereYear('truck_measured_data.measured_at','=', $year)
                  ->whereMonth('truck_measured_data.measured_at','=', $month)
                  ->groupBy('trucks.company_id');
    }

    public function scopeOverloaded($query, $id, $year, $month) {
      return $query->join('trucks', 'truck_measured_data.truck_id', '=', 'trucks.id')
                  ->selectRaw('count(truck_measured_data.truck_id) as overloaded')
                  ->where('truck_measured_data.remarks', 'overloaded')
                  ->where('trucks.company_id', $id)
                  ->whereYear('truck_measured_data.measured_at','=', $year)
                  ->whereMonth('truck_measured_data.measured_at','=', $month)
                  ->groupBy('trucks.company_id');
    }

    public function scopeTotalOverloaded($query, $year, $month) {
      return $query->join('trucks', 'truck_measured_data.truck_id', '=', 'trucks.id')
                  ->selectRaw('count(truck_measured_data.truck_id) as total')
                  ->where('truck_measured_data.remarks', 'overloaded')
                  ->whereYear('truck_measured_data.measured_at','=', $year)
                  ->whereMonth('truck_measured_data.measured_at','=', $month);
    }

    public function scopeCompanyIdExist($query, $id, $year, $month) {
      return $query->join('trucks', 'truck_measured_data.truck_id', '=', 'trucks.id')
                   ->where('trucks.company_id', $id)
                   ->whereYear('truck_measured_data.measured_at','=', $year)
                   ->whereMonth('truck_measured_data.measured_at','=', $month);
    }


}
