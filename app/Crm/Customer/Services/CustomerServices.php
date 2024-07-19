<?php
namespace Crm\Customer\Services;

use Crm\Customer\Events\CustomerCreation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Crm\Customer\Models\Customer;
use Crm\Customer\Repositories\CustomerRepository;
use Crm\Customer\Requests\CreateCustomer;

class CustomerServices
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->customerRepository->all();
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
    public function store(string $name)
    {
        $customer = new Customer();
        $customer->name = $name;

        $customer->save();

        event(new CustomerCreation($customer));
        return $customer;
    }

    /**
     * Display the specified resource.
     */
    public function show($customerId)
    {
        return $this->customerRepository->find($customerId);
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
        $customer = Customer::find($id);
        $customer->name = $request->name;

        $customer->save();

        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer)
    {
        $customer = Customer::find($customer);

        $customer->delete();

        return response()->json(['status' => 'data deleted'],Response::HTTP_OK);
    }
}
