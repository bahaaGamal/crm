<?php

namespace Crm\Customer\Repositories;

use App\Crm\Base\Repositories\Repository;
use Crm\Customer\Models\Customer;

class CustomerRepository extends Repository
{
    /**
     * Create a new event instance.
     */
    public function __construct(Customer $customer)
    {
        $this->setModel($customer);
    }
}
