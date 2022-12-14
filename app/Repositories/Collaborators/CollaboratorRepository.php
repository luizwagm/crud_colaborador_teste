<?php

namespace App\Repositories\Collaborators;

use App\Models\Collaborators;
use Illuminate\Database\Eloquent\Collection;

class CollaboratorRepository implements CollaboratorRepositoryContract
{
    /**
     * Constructor method to instance Collaborators.
     * 
     * @param \App\Models\Collaborators $model
     */
    public function __construct(
        protected Collaborators $model
    ) {
    }

    /**
     * Method to craete a new collaborator.
     * 
     * @param array $params
     * @return \App\Models\Collaborators
     */
    public function create(array $params): Collaborators
    {
        return $this->model->create($params);
    }

    /**
     * Method to update an existing collaborator.
     * 
     * @param int $id
     * @param array $params
     * @return \App\Models\Collaborators|null
     */
    public function update(int $id, array $params): ?Collaborators
    {
        if ($this->model->find($id)) {
            return $this->model
                ->where('id', $id)
                ->update($params);
        }

        return false;
    }

    /**
     * Method to request an existing collaborator.
     * 
     * @param int|null $cpf
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Collection|\App\Models\Collaborators|null
     */
    public function get($cpf = null, $id = null): Collection|Collaborators|null
    {
        $get = $this->model->with('addressCollaborator', 'paymentCollaborator');
            
        if ($cpf) {
            return $get->where('cpf', $cpf)->first();
        }

        if ($id) {
            return $get->where('id', $id)->first();
        }
    
        return $get->get();
    }

    /**
     * Method to delete an existing collaborator.
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model
            ->where('id', $id)
            ->delete();
    }
}
