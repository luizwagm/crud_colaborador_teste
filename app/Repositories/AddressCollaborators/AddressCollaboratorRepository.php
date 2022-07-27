<?php

namespace App\Repositories\AddressCollaborators;

use App\Models\AddressCollaborators;

class AddressCollaboratorsRepository implements AddressCollaboratorRepositoryContract
{
    public function __construct(
        protected AddressCollaborators $model
    ) {
    }

    public function create(array $params): AddressCollaborators
    {
        return $this->model->create($params);
    }

    public function update(int $id, array $params): ?AddressCollaborators
    {
        if ($this->model->find($id)) {
            return $this->model
                ->where('id', $id)
                ->update($params);
        }

        return false;
    }

    public function delete(int $id): bool
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }
}
