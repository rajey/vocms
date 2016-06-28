<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPhone extends Model
{
  protected $fillable = ['company_id', 'phone_number'];
    public function company() {

      return $this->belongsTo('App\Models\Company');
    }
}
