<?php

namespace App\Repositories\Collaborators;

use App\Models\Collaborators;
use Illuminate\Database\Eloquent\Collection;

class CollaboratorsRepository implements CollaboratorRepositoryContract
{
    public function __construct(
        protected Collaborators $model
    ) {
    }

    public function create(array $params): Collaborators
    {
        return $this->model->create($params);
    }

    public function update(int $id, array $params): ?Collaborators
    {
        if ($this->model->find($id)) {
            return $this->model
                ->where('id', $id)
                ->update($params);
        }

        return false;
    }

    public function get($cpf = null, $id = null): Collection
    {
        $get = $this->model;
            
        if ($cpf) {
            $get->where('cpf', $cpf);
        }

        if ($id) {
            $get->where('id', $id);
        }
    
        $get->with(['paymentCollaborator', 'addressCollaborator']);
        
        return $get->get();
    }

    public function delete(int $id): bool
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }
}
