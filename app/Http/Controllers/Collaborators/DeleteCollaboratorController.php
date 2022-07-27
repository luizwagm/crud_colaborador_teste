<?php

namespace App\Http\Controllers\Collaborators;

use App\Http\Requests\DeleteCollaboratorRequest;
use App\Services\Collaborators\CollaboratorServiceContract;
use Exception;
use Illuminate\Routing\Controller as BaseController;

class DeleteCollaboratorController extends BaseController
{
    public function __construct(
        protected CollaboratorServiceContract $service
    ) {  
    }

    public function __invoke(DeleteCollaboratorRequest $request)
    {
        try {
            $this->service->delete($request->id);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
