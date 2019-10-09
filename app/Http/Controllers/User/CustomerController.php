<?php

namespace App\Http\Controllers\User;

use App\Models\Person;
use App\Models\CompanyCustomer;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $clients = Person::join('customers', 'persons.id', '=', 'customers.id')
                ->whereNull('customers.deleted_at')
                ->orderBy('customers.updated_at', 'desc')
                ->where(function($q)use($search){
                    $q->where('persons.name','like','%'.$search.'%')
                    ->orWhere('persons.last_name','like','%'.$search.'%')
                    ->orWhere('persons.identification_card','like','%'.$search.'%')
                    ->orWhere('persons.phone','like','%'.$search.'%')
                    ->orWhere('persons.home_address','like','%'.$search.'%')
                    ->orWhere('persons.gender','like','%'.$search.'%');
                })
                ->paginate(10);

        return view('user/client_view', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/new_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $client = new Person();
        $client->name = $request->name;
        $client->last_name = $request->last_name;
        $client->identification_card = $request->identification_card;
        $client->phone = $request->phone;
        $client->home_address = $request->home_address;
        $client->gender = $request->gender;
        $client->birth_date = $request->birth_date;
        $client->save();

        $customer = new Customer();
        $customer->id = $client->id;
        $customer->created_at = $client->created_at;
        $customer->updated_at = $client->updated_at;
        $customer->save();


        if ((int)$request->slc_cuenta==2) {
            $company = new Company();
            $company->name=$request->name;
            $company->rtn=$request->rtn;
            $company->save();

            $company_Customer = new CompanyCustomer();
            $company_Customer->company_id=$company->id;
            $company_Customer->customer_id=$customer->id;
            $company_Customer->save();
        }


        return redirect()->route('user clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // hola
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Customer::find($id)->person;
        $isCompany = true;

        try {
            $client->customer->companies[0];
        } catch (\Throwable $th) {
            $isCompany = false;
        }

        return view('user/edit_client', compact('client', 'isCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        // $client = Customer::find($id)->person;
        // $client->name = $request->name;
        // $client->last_name = $request->last_name;
        // $client->identification_card = $request->identification_card;
        // $client->phone = $request->phone;
        // $client->home_address = $request->home_address;
        // $client->gender = $request->gender;
        // $client->birth_date = $request->birth_date;
        // $client->update();

        // $cust = $client->customer;
        // $cust->updated_at = $client->updated_at;
        // $cust->save();

        return redirect()->route('user clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Person::find($id)->customer;
        $client->delete();

        return redirect()->route('user clients');
    }
}
