<?php

namespace App\Repositories\Collaborators;

use App\Models\Collaborators;
use Illuminate\Database\Eloquent\Collection;

interface CollaboratorRepositoryContract
{
    /**
     * Method to craete a new collaborator.
     * 
     * @param array $params
     * @return \App\Models\Collaborators
     */
    public function create(array $params): Collaborators;

    /**
     * Method to update an existing collaborator.
     * 
     * @param int $id
     * @param array $params
     * @return \App\Models\Collaborators|null
     */
    public function update(int $id, array $params): ?Collaborators;

    /**
     * Method to request an existing collaborator.
     * 
     * @param int|null $cpf
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Collaborators|null
     */
    public function get(int|null $cpf = null, int|null $id = null): Collection|Collaborators|null;

    /**
     * Method to delete an existing collaborator.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}