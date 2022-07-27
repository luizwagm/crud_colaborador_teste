<?php

namespace App\Providers;

use App\Services\AddressCollaborators\{
    AddressCollaboratorService,
    AddressCollaboratorServiceContract
};
use App\Services\Collaborators\{
    CollaboratorService,
    CollaboratorServiceContract
};
use App\Services\PaymentCollaborators\{
    PaymentCollaboratorService,
    PaymentCollaboratorServiceContract
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CollaboratorServiceContract::class, CollaboratorService::class);
        $this->app->singleton(AddressCollaboratorServiceContract::class, AddressCollaboratorService::class);
        $this->app->singleton(PaymentCollaboratorServiceContract::class, PaymentCollaboratorService::class);
    }
}
