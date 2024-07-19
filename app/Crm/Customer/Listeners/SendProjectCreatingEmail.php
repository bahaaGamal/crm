<?php

namespace Crm\Customer\Listeners;

use Crm\Customer\Services\CustomerServices;
use Crm\Project\Events\ProjectCreation;

class SendProjectCreatingEmail
{
    private CustomerServices $customerServices;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CustomerServices $customerServices)
    {
        $this->customerServices = $customerServices;
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(ProjectCreation $event)
    {
        $project = $event->getProject();

        $customer = $this->customerServices->show($project->customer_id);
    }
}
