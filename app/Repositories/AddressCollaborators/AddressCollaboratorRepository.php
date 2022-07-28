<?php

namespace App\Repositories\AddressCollaborators;

use App\Models\AddressCollaborators;

class AddressCollaboratorRepository implements AddressCollaboratorRepositoryContract
{
    /**
     * Constructor method to instance AddressCollaborators.
     * 
     * @param \App\Models\AddressCollaborators $model
     */
    public function __construct(
        protected AddressCollaborators $model
    ) {
    }

    /**
     * Method to craete a new address collaborator.
     * 
     * @param array $params
     * @return \App\Models\AddressCollaborators
     */
    public function create(array $params): AddressCollaborators
    {
        return $this->model->create($params);
    }

    /**
     * Method to update an existing address collaborator.
     * 
     * @param int $id
     * @param array $params
     * @return \App\Models\AddressCollaborators|null
     */
    public function update(int $id, array $params): ?AddressCollaborators
    {
        if ($this->model->find($id)) {
            return $this->model
                ->where('id', $id)
                ->update($params);
        }

        return null;
    }

    /**
     * Method to delete an existing address collaborator.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }
}
