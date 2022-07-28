<?php

namespace App\Repositories\PaymentCollaborators;

use App\Models\PaymentCollaborators;

interface PaymentCollaboratorRepositoryContract
{
    /**
     * Method to craete a new payment collaborator.
     * 
     * @param array $params
     * @return \App\Models\PaymentCollaborators
     */
    public function create(array $params): PaymentCollaborators;

    /**
     * Method to update an existing payment collaborator.
     * 
     * @param int $id
     * @param array $params
     * @return \App\Models\PaymentCollaborators|null
     */
    public function update(int $id, array $params): ?PaymentCollaborators;

    /**
     * Method to delete an existing payment collaborator.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}