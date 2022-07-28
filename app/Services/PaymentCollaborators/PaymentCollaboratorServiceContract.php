<?php

namespace App\Services\PaymentCollaborators;

interface PaymentCollaboratorServiceContract
{
    /**
     * Method to store an existing payment collaborator.
     * 
     * @param array $params
     * @param int $id
     * @return array
     */
    public function store(array $params, int $id = 0): array;

    /**
     * Method to delete an existing payment collaborator.
     * 
     * @param int $id
     * @return array
     */
    public function delete(int $id): array;
}