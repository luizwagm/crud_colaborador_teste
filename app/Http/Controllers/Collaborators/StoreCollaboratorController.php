<?php

namespace App\Http\Controllers\Collaborators;

use App\Http\Requests\StoreCollaboratorRequest;
use App\Services\Collaborators\CollaboratorServiceContract;
use Exception;
use Illuminate\Routing\Controller as BaseController;

class StoreCollaboratorController extends BaseController
{
    public function __construct(
        protected CollaboratorServiceContract $service
    ) {  
    }

    public function __invoke(StoreCollaboratorRequest $request)
    {
        try {
            $this->service->store($request->validated());
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
