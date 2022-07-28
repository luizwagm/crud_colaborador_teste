<?php

namespace App\Http\Controllers\Collaborators;

use App\Http\Requests\DeleteCollaboratorRequest;
use App\Services\Collaborators\CollaboratorServiceContract;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class DeleteCollaboratorController extends BaseController
{
    /**
     * Constructor method to instance CollaboratorServiceContract.
     * 
     * @param \App\Services\Collaborators\CollaboratorServiceContract $service
     */
    public function __construct(
        protected CollaboratorServiceContract $service
    ) {  
    }

    /**
     * Method to delete an existing collaborator.
     * 
     * @param \App\Http\Requests\DeleteCollaboratorRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(DeleteCollaboratorRequest $request): Response
    {
        try {
            $this->service->delete($request->id);

            return response(json_encode(['message' => 'Success']), 204);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
