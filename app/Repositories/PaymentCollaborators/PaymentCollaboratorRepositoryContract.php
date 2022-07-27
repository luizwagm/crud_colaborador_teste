<?php

namespace App\Repositories\PaymentCollaborators;

use App\Models\PaymentCollaborators;

interface PaymentCollaboratorRepositoryContract
{
    public function create(array $params): PaymentCollaborators;
    public function update(int $id, array $params): ?PaymentCollaborators;
    public function delete(int $id): bool;
}