<?php

namespace App\Repositories\AppClasses;

use App\Repositories\Eloquents\CompanyRepository as Company;

use Illuminate\Http\Request;

use Response;

use Validator;

class TruckCompanies {

	protected $company;
	protected $request;

	public function __construct(Company $company, Request $request) {

		$this->company = $company;
		$this->request = $request;
	}

	public function getAllCompanies($task) {

		return $this->company->getAllCompanies($task);
	}

	public function companyById($id) {
		return $this->company->getCompanyById($id);
	}


	public function validateAndStore($formData, $action) {

		$validation = Validator::make($formData, $this->getValidationErrors($action));

		if($validation->fails()) {

			return Response::json(['success' => false, 'errors' => $validation->errors()->toArray()]);

		} else {
			if($action == 'create') {
				$success = $this->company->create($formData);
				$message = 'New Company Successfully added !!';

			} elseif($action == 'update') {
				$success = $this->company->update($formData);
				$message = 'Company Successfully updated !!';
			}


			if($success) {

				return $this->returnSucessMessage($message);

			} else return $this->returnFailMessage();

		}

	}

	public function getValidationErrors($action) {

		if($action == 'create') {
			$email_rules = 'required|email|unique:companies';
		} else {
			$email_rules = 'required|email';
		}

		return  [

			'name' => 'required|min:3',
			'box' => 'required',
			'email' => $email_rules,
			'region' => 'required',
			'district' => 'required',
			'phone-1' => 'required|max:13'

			];

	}


	public function returnSucessMessage($message) {

		if($this->request->ajax()) {

            return Response::json(['success' => true, 'message' => $message]);
        }
	}

	public function returnFailMessage() {

		if($this->requset->ajax()) {

            return Response::json(['success' => true, 'message' => 'Something went wrong, Try again later']);
        }
	}

	public function totalOverload($companies) {
		$number = 0;
		foreach ($companies as $value) {
			$number = $number + $value->overload_ratio;
		}
		return $number;
	}
}
