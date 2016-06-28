<?php

namespace App\Repositories\AppClasses;

use App\Repositories\Eloquents\ConfigRepository as Config;

use Validator;
use Illuminate\Http\Request;
use Response;

class AxleConfigurations {

	protected $config;
	protected $request;

	public function __construct(Config $config, Request $request) {

		$this->config = $config;
		$this->request = $request;
	}

	public function getConfiguration($page) {

		return $this->config->get($page);


	}


	public function validateAndStore($formData, $action) {

		$validation = Validator::make($formData, $this->getValidationErrors($action));

		if($validation->fails()) {

			return Response::json(['success' => false, 'errors' => $validation->errors()->toArray()]);

		} else {
			if($action == 'create') {
				$success = $this->config->create($formData);
				$message = 'New Configuration Successfully added !!';

			} elseif($action == 'update') {
				$success = $this->config->update($formData);
				$message = 'Configuration Successfully updated !!';
			}


			if($success) {

				return $this->returnSucessMessage($message);

			} else return $this->returnFailMessage();

		}

	}

	public function getValidationErrors($action) {
		if($action == 'create') {
			$config_rules = 'required|unique:truck_configurations';
		} else {
			$config_rules = 'required';
		}

		return  [

			'configuration' => $config_rules,
			'gvm' => 'required',
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
