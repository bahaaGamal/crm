<?php

namespace App\Http\Controllers;

use Crm\Customer\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Crm\Customer\Requests\CreateCustomer;
use Crm\Customer\Services\CustomerServices;

class CustomerController extends Controller
{
    private CustomerServices $customerServices;

    public function __construct(CustomerServices $customerServices)
    {
        $this->customerServices = $customerServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->customerServices->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomer $request)
    {
        return $this->customerServices->store($request->name);
    }

    /**
     * Display the specified resource.
     */
    public function show($customerId)
    {
        return $this->customerServices->show($customerId)?? response()->json(['status' => 'data not found'],Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        return $this->customerServices->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer)
    {
        return $this->customerServices->destroy($customer);
    }
}
