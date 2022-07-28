<?php

namespace App\Services\AddressCollaborators;

interface AddressCollaboratorServiceContract
{
    /**
     * Method to store an existing address collaborator.
     * 
     * @param array $params
     * @param int $id
     * @return array
     */
    public function store(array $params, int $id = 0): array;

    /**
     * Method to delete an existing address collaborator.
     * 
     * @param int $id
     * @return array
     */
    public function delete(int $id): array;
}