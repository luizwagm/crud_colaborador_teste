<?php

namespace App\Services\PaymentCollaborators;

interface PaymentCollaboratorServiceContract
{
    public function store(array $params, int $id = 0): array;
    public function delete(int $id): array;
}