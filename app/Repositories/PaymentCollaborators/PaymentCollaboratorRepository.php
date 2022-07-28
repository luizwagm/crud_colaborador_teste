<?php

namespace App\Repositories\PaymentCollaborators;

use App\Models\PaymentCollaborators;

class PaymentCollaboratorsRepository implements PaymentCollaboratorRepositoryContract
{
    /**
     * Constructor method to instance PaymentCollaborators.
     * 
     * @param \App\Models\PaymentCollaborators $model
     */
    public function __construct(
        protected PaymentCollaborators $model
    ) {
    }

    /**
     * Method to craete a new payment collaborator.
     * 
     * @param array $params
     * @return \App\Models\PaymentCollaborators
     */
    public function create(array $params): PaymentCollaborators
    {
        return $this->model->create($params);
    }

    /**
     * Method to update an existing payment collaborator.
     * 
     * @param int $id
     * @param array $params
     * @return \App\Models\PaymentCollaborators|null
     */
    public function update(int $id, array $params): ?PaymentCollaborators
    {
        if ($this->model->find($id)) {
            return $this->model
                ->where('id', $id)
                ->update($params);
        }

        return false;
    }

    /**
     * Method to delete an existing payment collaborator.
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
