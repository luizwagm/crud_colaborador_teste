<?php

namespace App\Services\AddressCollaborators;

use App\Repositories\AddressCollaborators\AddressCollaboratorRepositoryContract;

class AddressCollaboratorService implements AddressCollaboratorServiceContract
{
    /**
     * Constructor method to instance services and repositories.
     * 
     * @param \App\Repositories\AddressCollaborators\AddressCollaboratorRepositoryContract $repository
     */
    public function __construct(
        protected AddressCollaboratorRepositoryContract $repository
    ) {  
    }

    /**
     * Method to store an existing address collaborator.
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
     * Method to delete an existing address collaborator.
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
