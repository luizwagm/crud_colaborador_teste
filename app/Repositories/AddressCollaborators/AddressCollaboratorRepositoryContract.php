<?php

namespace App\Repositories\AddressCollaborators;

use App\Models\AddressCollaborators;

interface AddressCollaboratorRepositoryContract
{
    public function create(array $params): AddressCollaborators;
    public function update(int $id, array $params): ?AddressCollaborators;
    public function delete(int $id): bool;
}