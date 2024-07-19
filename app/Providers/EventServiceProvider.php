<?php

namespace App\Providers;

use Crm\Customer\Events\CustomerCreation;
use Crm\Customer\Listeners\ModifySalesOnCustomerCreation;
use Crm\Customer\Listeners\SendProjectCreatingEmail;
use Crm\Project\Events\ProjectCreation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CustomerCreation::class => [
            ModifySalesOnCustomerCreation::class,
        ],
        ProjectCreation::class => [
            SendProjectCreatingEmail::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
