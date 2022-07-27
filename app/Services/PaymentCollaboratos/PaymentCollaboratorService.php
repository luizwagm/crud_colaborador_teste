<?php

namespace App\Services\PaymentCollaborators;

use App\Repositories\PaymentCollaborators\PaymentCollaboratorRepositoryContract;

class PaymentCollaboratorService implements PaymentCollaboratorServiceContract
{
    public function __construct(
        protected PaymentCollaboratorRepositoryContract $repository
    ) {  
    }

    public function store(array $params, int $id = 0): array
    {
        if (empty($params)) {
            return ['message' => 'Params is required', 'status' => 400];
        }

        $store = $id > 0
            ? $this->repository->update($id, $params)
            : $this->repository->create($params);

        return ['data' => $store, 'status' => 200];
    }

    public function delete(int $id = 0): array
    {
        if ($id == 0) {
            return ['message' => 'Id is required', 'status' => 400];
        }

        $this->repository->delete($id);

        return ['status' => 204];
    }
}
