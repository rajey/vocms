<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\UserPhone;
use App\User;
use App\Region;
use DB;
use Request;
use Response;
use Validator;

class RegionalManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Get all managers' details
        $managers = DB::table('users')
                        ->leftjoin('regions', 'users.location_id', '=', 'regions.id')

                        ->select(
                            'users.id',
                            'users.firstname',
                            'users.lastname',
                            'users.email',
                            'regions.id as region_id',
                            'regions.region_name'
                            )
                        ->get();
        //get mobile phones for every manager

        $phones = DB::table('user_phones')->select('phone_number', 'user_id')->get();

        //Get list of all regions
        $regions = Region::all();

        $region[0] = '--select--';

        foreach ($regions as $value) {
            $region[$value->id] = $value->region_name;
        }

        return view('manager.index')->with([
                                            'managers' => $managers,
                                            'phones' => $phones,
                                            'region' => $region
                                        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $formData = Request::all();


        $validator = Validator::make($formData, [
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|max:13',
            'region' => 'required'
            ]);
        
        if($validator->fails()) {
            //Works if ajax is used
            if(Request::ajax()) {
                return Response::json(['success' => false, 'errors' => $validator->errors()->toArray()]);
            } else {
                //Works is ajax is not used
                return redirect('manager/create') 
                        ->withErrors($validator)
                        ->withInput();
            }
        }

        //Create company object
        $user = new User;

        //Populate the company object with form data
        $user->firstname = $formData['firstname'];
        $user->lastname = $formData['lastname'];
        $user->email = $formData['email'];
        $user->location_id = $formData['region'];

        //Save the form data into the companies table
        $user->save();

        //Get newly saved company id
        $id = DB::table('users')->where('email', $formData['email'])
                                    ->value('id');


        //create companyPhone object
        $phone = new UserPhone;

        //Populate the companyPhone object with form data
        $phone->phone_number = $formData['phone_number'];
        $phone->user_id = $id;

        //Save Phone data into company_phones table
        $phone->save();


        //return success signal to the form
        if(Request::ajax()) {
            return Response::json(['success' => true, 'message' => 'New manager created!!']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
