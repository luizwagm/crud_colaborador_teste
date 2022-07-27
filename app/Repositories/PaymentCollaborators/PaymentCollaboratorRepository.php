<?php

namespace App\Repositories\PaymentCollaborators;

use App\Models\PaymentCollaborators;

class PaymentCollaboratorsRepository implements PaymentCollaboratorRepositoryContract
{
    public function __construct(
        protected PaymentCollaborators $model
    ) {
    }

    public function create(array $params): PaymentCollaborators
    {
        return $this->model->create($params);
    }

    public function update(int $id, array $params): ?PaymentCollaborators
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
