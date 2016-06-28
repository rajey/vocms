<?php

namespace App\Repositories\Eloquents;

use App\Models\Company;
use App\Models\CompanyLocation;
use App\Models\CompanyPhone;

use DB;

use Response;

class CompanyRepository {

	public function getAllCompanies($task) {

		if($task == 'display') {
			return Company::with('location')->paginate(10);

		} elseif ($task == 'dropdown') {
			return Company::select('id', 'name')->get();
		}

	}

	public function getCompanyById($id) {

		return Company::with('location')->find($id);
	}

	public function create($data) {

		$company = Company::create([
			'name' => $data['name'],
			'box_number' => $data['box'],
			'email' => $data['email'],
			'status' => 'active',
		]);

		/*
		 * Get id of newly created StationRepository
		 */
		$id = $company->id;

		$this->attachLocation($id, $data['district']);

		$this->attachPhoneNumber($id, $data['phone-1']);

		return true;
	}

	public function update($data) {
		$company = Company::find($data['id']);
		/*
		 * Update Company
		 */
		$company->name = $data['name'];
		$company->email = $data['email'];
		$company->box_number = $data['box'];

		$company->save();

		/*
		 * Update location
		 */
		$this->updateLocation($data['id'], $data['district']);

		/*
		 * Update Phone
		 */
		 $this->updatePhoneNumber($data['id'], $data['phone-1']);


		return true;
	}

	public function attachLocation($company_id, $district_id) {

		CompanyLocation::create([
			'company_id' => $company_id,
			'district_id' => $district_id
		]);
  }

	public function attachPhoneNumber($company_id, $phone) {
		CompanyPhone::create([
			'company_id' => $company_id,
			'phone_number' => $phone,
		]);
	}

	public function updateLocation($company_id, $district_id) {
		CompanyLocation::where('company_id', $company_id)
										->update(['district_id' => $district_id]);
	}

	public function updatePhoneNumber($company_id, $phone) {

			CompanyPhone::where('company_id', $company_id)
										->update(['phone_number' => $phone]);
	}
}
