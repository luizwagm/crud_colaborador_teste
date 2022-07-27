<?php

namespace App\Providers;

use App\Repositories\AddressCollaborators\{
    AddressCollaboratorRepository,
    AddressCollaboratorRepositoryContract
};
use App\Repositories\Collaborators\{
    CollaboratorRepository,
    CollaboratorRepositoryContract
};
use App\Repositories\PaymentCollaborators\{
    PaymentCollaboratorRepository,
    PaymentCollaboratorRepositoryContract
};
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CollaboratorRepositoryContract::class, CollaboratorRepository::class);
        $this->app->singleton(PaymentCollaboratorRepositoryContract::class, PaymentCollaboratorRepository::class);
        $this->app->singleton(AddressCollaboratorRepositoryContract::class, AddressCollaboratorRepository::class);
    }
}
