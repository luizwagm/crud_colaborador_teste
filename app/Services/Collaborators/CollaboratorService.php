<?php

namespace App\Services\Collaborators;

use App\Repositories\Collaborators\CollaboratorRepositoryContract;
use App\Services\AddressCollaborators\AddressCollaboratorServiceContract;
use App\Services\PaymentCollaborators\PaymentCollaboratorServiceContract;

class CollaboratorService implements CollaboratorServiceContract
{
    /**
     * Constructor method to instance services and repositories.
     * 
     * @param \App\Repositories\Collaborators\CollaboratorRepositoryContract $repository
     * @param \App\Services\AddressCollaborators\AddressCollaboratorServiceContract $addressCollaboratorService
     * @param \App\Services\PaymentCollaborators\PaymentCollaboratorServiceContract $paymentCollaboratorService
     */
    public function __construct(
        protected CollaboratorRepositoryContract $repository,
        protected AddressCollaboratorServiceContract $addressCollaboratorService,
        protected PaymentCollaboratorServiceContract $paymentCollaboratorService
    ) {  
    }

    /**
     * Method to store an new collaborator or existing collaborator.
     * 
     * @param array $params
     * @return array
     */
    public function store(array $params): array
    {
        if (empty($params)) {
            return ['message' => 'Params is required', 'status' => 400];
        }

        $get = $this->repository->get(cpf: $params['cpf']);

        $getId = $get ? $get->id : 0;

        $store = $get
            ? $this->repository->update($getId, $params)
            : $this->repository->create($params);

        $params['collaborator_id'] = $store->id;

        $this->addressCollaboratorService->store($params, $getId);
        $this->paymentCollaboratorService->store($params, $getId);

        return ['data' => $store, 'status' => 200];
    }

    /**
     * Method to request an existing collaborator.
     * 
     * @param int|null $cpf
     * @param int|null $id
     * @return array
     */
    public function get(int|null $cpf = null, int|null $id = null): array
    {
        return [
            'data' => $this->repository->get($cpf, $id),
            'status' => 200
        ];
    }

    /**
     * Method to delete an existing collaborator.
     * 
     * @param int $id
     * @return array
     */
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
