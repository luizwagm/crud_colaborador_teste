<?php

namespace App\Services\Collaborators;

interface CollaboratorServiceContract
{
    public function store(array $params): array;
    public function get($cpf = null, $id = null): array;
    public function delete(int $id): array;
}