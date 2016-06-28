<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

    if (Auth::check()) {

      return redirect('/company');

    } else return view('welcome');
});

Route::auth();

Route::group(['middleware' => ['auth']], function () {

	Route::resource('company', 'CompanyController');
  Route::post('company-statistics', 'CompanyStatisticsController@get');
	Route::resource('district', 'DistrictController');
	Route::resource('truck', 'TruckController');
	Route::resource('station', 'WeighbridgeStationController');
	Route::resource('manager', 'RegionalManagerController');
	Route::get('station-report/{id}/{year}', 'WeighbridgeReportController@get');
	Route::resource('configuration', 'AxleConfigurationController');
  Route::get('/get-district/{id}', 'RegionController@getDistrictsByRegionId');
});

Route::get('/home', 'HomeController@index');
Route::get('test', function() {
  return date('Y')+Carbon\Carbon::now()->second.strtoupper(str_random(6));
});
