<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Crm\Customer\Models\Customer;
use Illuminate\Http\JsonResponse;
use Crm\Customer\Requests\CreateCustomer;
use Crm\Customer\Services\CustomerServices;
use Crm\Customer\Services\Export\ExportFactory;
use Crm\Customer\Services\CustomerExportService;

class CustomerController extends Controller
{
    private CustomerServices $customerServices;
    private CustomerExportService $customerExportService;

    public function __construct(CustomerServices $customerServices,CustomerExportService $customerExportService)
    {
        $this->customerServices = $customerServices;
        $this->customerExportService = $customerExportService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers =  $this->customerServices->index();
        return reponseBuilder()
        ->setData($customers)
        ->response();
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
        $customer = $this->customerServices->show($customerId);
        if(!$customer) {
            return reponseBuilder()
                ->setStatusCode(JsonResponse::HTTP_NOT_FOUND)
                ->setErrors(['generic' => 'Customer not found'])
                ->response();
        }
        return reponseBuilder()
            ->setData($customer)
            ->response();
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

    public function export(Request $request)
    {
        $format = $request->get('format','json');
        $exporter = ExportFactory::instance($format);
        $this->customerExportService->export($format, $exporter);
    }
}
