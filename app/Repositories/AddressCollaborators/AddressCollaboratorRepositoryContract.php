<?php

namespace App\Repositories\AddressCollaborators;

use App\Models\AddressCollaborators;

interface AddressCollaboratorRepositoryContract
{
    /**
     * Method to craete a new address collaborator.
     * 
     * @param array $params
     * @return \App\Models\AddressCollaborators
     */
    public function create(array $params): AddressCollaborators;
    
    /**
     * Method to update an existing address collaborator.
     * 
     * @param int $id
     * @param array $params
     * @return \App\Models\AddressCollaborators|null
     */
    public function update(int $id, array $params): ?AddressCollaborators;
    
    /**
     * Method to delete an existing address collaborator.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}