<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = ['plate_number', 'tag_id', 'company_id', 'configuration_id'];

    public function company() {

      return $this->belongsTo('App\Models\Company');
    }

    public function configuration() {

      return $this->belongsTo('App\Models\TruckConfiguration');
    }

    public function measuredData() {
      return $this->hasMany('App\Models\TruckMeasuredData');
    }

    public function scopeWeighed($query) {
      return $query->join('truck_measured_data', 'trucks.id', '=', 'truck_measured_data.truck_id');
    }

    public function scopeCompanyName($query) {
      return $query->join('companies', 'trucks.company_id', '=', 'companies.id');
    }

}
