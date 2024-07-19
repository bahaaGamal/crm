<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Crm\Project\Models\Project;
use Crm\Customer\Models\Customer;
use Crm\Project\Requests\CreateProject;
use Crm\Project\Services\ProjectService;
use Crm\Customer\Services\CustomerServices;

class ProjectController extends Controller
{
    private ProjectService $projectService;
    private CustomerServices $customerServices;

    public function __construct(ProjectService $projectService, CustomerServices $customerServices)
    {
        $this->projectService = $projectService;
        $this->customerServices = $customerServices;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProject $request,$customerId)
    {
        $customer = $this->customerServices->show($customerId);
        if( !$customer ) {
            return response()->json(['status'=> 'Customer Not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->projectService->store($request,$customerId);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
