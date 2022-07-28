<?php

namespace App\Http\Controllers\Collaborators;

use App\Http\Requests\StoreCollaboratorRequest;
use App\Services\Collaborators\CollaboratorServiceContract;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class StoreCollaboratorController extends BaseController
{
    /**
     * Constructor method to instance CollaboratorServiceContract.
     * 
     * @param \App\Http\Requests\CollaboratorServiceContract $service
     */
    public function __construct(
        protected CollaboratorServiceContract $service
    ) {  
    }

    /**
     * Method to store a new collaborator or an existing collaborator.
     * 
     * @param \App\Http\Requests\StoreCollaboratorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StoreCollaboratorRequest $request): Response
    {
        try {
            $storeCollaborator = $this->service->store($request->validated());

            return response($storeCollaborator);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
