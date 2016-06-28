<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class CompanyLocation extends Model
{
    protected $fillable = ['company_id', 'district_id'];
    protected $appends = ['region_id', 'district_name', 'region_name'];

    public function company() {

      return $this->belongsTo('App\Models\Company');
    }

    public function district() {

      return $this->belongsTo('App\Models\District');
    }

    public function getRegionIdAttribute() {
      $query = DB::table('locations')
                ->select('region_id')
                ->where('district_id',$this->attributes['district_id'])
                ->first();
      return $query->region_id;
    }

    public function getDistrictNameAttribute() {
      $query = DB::table('locations')
                ->select('district')
                ->where('district_id',$this->attributes['district_id'])
                ->first();
      return $query->district;
    }

    public function getRegionNameAttribute() {
      $query = DB::table('locations')
                ->select('region')
                ->where('district_id',$this->attributes['district_id'])
                ->first();
      return $query->region;
    }
}
