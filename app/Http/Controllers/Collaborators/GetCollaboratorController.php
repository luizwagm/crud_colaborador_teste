<?php

namespace App\Http\Controllers\Collaborators;

use App\Http\Requests\GetCollaboratorRequest;
use App\Services\Collaborators\CollaboratorServiceContract;
use Exception;
use Illuminate\Routing\Controller as BaseController;

class GetCollaboratorController extends BaseController
{
    public function __construct(
        protected CollaboratorServiceContract $service
    ) {  
    }

    public function __invoke(GetCollaboratorRequest $request)
    {
        try {
            $this->service->get($request->cpf, $request->id);
        } catch (Exception $e) {
            return response($e->getMessage(), 400);
        }
    }
}
