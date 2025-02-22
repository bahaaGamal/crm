<?php

namespace Crm\Customer\Services;

use Crm\Customer\Exceptions\InvalidExportFormat;
use Crm\Customer\Repositories\CustomerRepository;
use Crm\Customer\Services\Export\ExportInterface;

class CustomerExportService
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function export(string $format, ExportInterface $exporter){
        $customers = $this->customerRepository->all();

        $exporter->export($customers->toArray());



    }
}
