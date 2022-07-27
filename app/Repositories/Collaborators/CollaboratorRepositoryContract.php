<?php

namespace App\Repositories\Collaborators;

use App\Models\Collaborators;
use Illuminate\Database\Eloquent\Collection;

interface CollaboratorRepositoryContract
{
    public function create(array $params): Collaborators;
    public function update(int $id, array $params): ?Collaborators;
    public function get($cpf = null, $id = null): Collection;
    public function delete(int $id): bool;
}