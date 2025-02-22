<?php

namespace Crm\Customer\Listeners;

use Crm\Customer\Events\CustomerCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ModifySalesOnCustomerCreation
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CustomerCreation $event): void
    {
        $customer = $event->getCustomer();

    }
}
