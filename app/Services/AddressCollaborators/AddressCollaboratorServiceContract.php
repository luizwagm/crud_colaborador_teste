<?php

namespace App\Services\AddressCollaborators;

interface AddressCollaboratorServiceContract
{
    public function store(array $params, int $id = 0): array;
    public function delete(int $id): array;
}