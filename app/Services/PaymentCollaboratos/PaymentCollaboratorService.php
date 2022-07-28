<?php

namespace App\Services\PaymentCollaborators;

use App\Repositories\PaymentCollaborators\PaymentCollaboratorRepositoryContract;

class PaymentCollaboratorService implements PaymentCollaboratorServiceContract
{
    /**
     * Constructor method to instance services and repositories.
     * 
     * @param \App\Repositories\PaymentCollaborators\PaymentCollaboratorRepositoryContract $repository
     */
    public function __construct(
        protected PaymentCollaboratorRepositoryContract $repository
    ) {  
    }

    /**
     * Method to store an existing payment collaborator.
     * 
     * @param array $params
     * @param int $id
     * @return array
     */
    public function store(array $params, int $id = 0): array
    {
        if (empty($params)) {
            return ['message' => 'Params is required', 'status' => 400];
        }

        $store = $id > 0
            ? $this->repository->update($id, $params)
            : $this->repository->create($params);

        return ['data' => $store, 'status' => 200];
    }

    /**
     * Method to delete an existing payment collaborator.
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

        return ['status' => 204];
    }
}
