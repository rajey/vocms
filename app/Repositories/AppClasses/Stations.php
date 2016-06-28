<?php

namespace App\Repositories\AppClasses;

use App\Repositories\Eloquents\StationRepository as Station;

use Illuminate\Http\Request;

use Validator;
use Response;

class Stations {

  protected $station;
  protected $request;

  public function __construct(Station $station, Request $request) {
    $this->station = $station;
    $this->request = $request;
  }

  public function getAllStations() {

    return$this->station->getAll();
  }

  public function validateAndStore($formData, $action) {

		$validation = Validator::make($formData, $this->getValidationErrors($action));

		if($validation->fails()) {

			return Response::json(['success' => false, 'errors' => $validation->errors()->toArray()]);

		} else {
			if($action == 'create') {
				$success = $this->station->create($formData);
				$message = 'New Station Successfully added !!';

			} elseif($action == 'update') {
				$success = $this->station->update($formData);
				$message = 'Station Successfully updated !!';
			}


			if($success) {

				return $this->returnSucessMessage($message);

			} else return $this->returnFailMessage();

		}

	}

	public function getValidationErrors($action) {

		return  [

			'name' => 'required|min:3',
			'region' => 'required',
			'district' => 'required',

			];

	}


	public function returnSucessMessage($message) {

		if($this->request->ajax()) {

            return Response::json(['success' => true, 'message' => $message]);
        }
	}

	public function returnFailMessage() {

		if($this->request->ajax()) {

            return Response::json(['success' => true, 'message' => 'Something went wrong, Try again later']);
        }
	}
}
