<?php

namespace App\Http\Controllers\Collaborators;

use App\Http\Requests\GetCollaboratorRequest;
use App\Services\Collaborators\CollaboratorServiceContract;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class GetCollaboratorController extends BaseController
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
     * Method to request an existing collaborator.
     * 
     * @param \App\Http\Requests\GetCollaboratorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GetCollaboratorRequest $request): Response
    {
        try {
            $getCollaborator = $this->service->get($request->cpf, $request->id);

            return response($getCollaborator);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
