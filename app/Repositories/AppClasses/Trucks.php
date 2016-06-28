<?php

namespace App\Repositories\AppClasses;

use App\Repositories\Eloquents\TruckRepository as Truck;

use Validator;
use Illuminate\Http\Request;
use Response;

class Trucks {

	protected $truck;
	protected $request;

	public function __construct(Truck $truck, Request $request) {

		$this->truck = $truck;
		$this->request = $request;

	}

	/*
	 * Get list of truck for a particular company
	 */

	public function trucksByCompany($id) {

		return $this->truck->getTrucksByCompany($id);
	}

	public function validateAndStore($formData, $action) {

		$validation = Validator::make($formData, $this->getValidationErrors($action));

		if($validation->fails()) {

			return Response::json(['success' => false, 'errors' => $validation->errors()->toArray()]);

		} else {
			if($action == 'create') {
				$success = $this->truck->create($formData);
				$message = 'New Truck Successfully added !!';

			} elseif($action == 'update') {
				$success = $this->truck->update($formData);
				$message = 'Truck Successfully updated !!';
			}


			if($success) {

				return $this->returnSucessMessage($message);

			} else return $this->returnFailMessage();

		}

	}

	public function getValidationErrors($action) {

		if($action == 'create') {
			$plate_rules = 'required|unique:trucks';
			$tag_rules = 'required|unique:trucks';
		} else {
			$plate_rules = 'required';
			$tag_rules = 'required';
		}

		return  [

			'plate_number' => $plate_rules,
			'configuration' => 'required',
			'tag_id' => $tag_rules

			];

	}


	public function returnSucessMessage($message) {

		if($this->request->ajax()) {

            return Response::json(['success' => true, 'message' => $message]);
        }
	}

	public function returnFailMessage() {

		if(Request::ajax()) {

            return Response::json(['success' => true, 'message' => 'Something went wrong, Try again later']);
        }
	}

}
