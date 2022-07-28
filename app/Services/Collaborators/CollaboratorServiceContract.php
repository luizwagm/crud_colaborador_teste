<?php

namespace App\Services\Collaborators;

interface CollaboratorServiceContract
{
    /**
     * Method to store an new collaborator or existing collaborator.
     * 
     * @param array $params
     * @return array
     */
    public function store(array $params): array;

    /**
     * Method to request an existing collaborator.
     * 
     * @param int|null $cpf
     * @param int|null $id
     * @return array
     */
    public function get(int|null $cpf = null, int|null $id = null): array;

    /**
     * Method to delete an existing collaborator.
     * 
     * @param int $id
     * @return array
     */
    public function delete(int $id): array;
}