<?php

namespace App\Services\Collaborators;

use App\Repositories\Collaborators\CollaboratorRepositoryContract;
use App\Services\AddressCollaborators\AddressCollaboratorServiceContract;
use App\Services\PaymentCollaborators\PaymentCollaboratorServiceContract;

class CollaboratorService implements CollaboratorServiceContract
{
    public function __construct(
        protected CollaboratorRepositoryContract $repository,
        protected AddressCollaboratorServiceContract $addressCollaboratorService,
        protected PaymentCollaboratorServiceContract $paymentCollaboratorService
    ) {  
    }

    public function store(array $params): array
    {
        if (empty($params)) {
            return ['message' => 'Params is required', 'status' => 400];
        }

        $get = $this->repository->get(cpf: $params['cpf']);

        $store = $get
            ? $this->repository->update($get->id, $params)
            : $this->repository->create($params);

        $this->addressCollaboratorService->store($params, $store->id);
        $this->paymentCollaboratorService->store($params, $store->id);

        return ['data' => $store, 'status' => 200];
    }

    public function get($cpf = null, $id = null): array
    {
        return [
            'data' => $this->repository->get($cpf, $id),
            'status' => 200
        ];
    }

    public function delete(int $id = 0): array
    {
        if ($id == 0) {
            return ['message' => 'Id is required', 'status' => 400];
        }

        $this->repository->delete($id);
        $this->addressCollaboratorService->delete($id);
        $this->paymentCollaboratorService->delete($id);

        return ['status' => 204];
    }
}
