<?php

namespace App\Repositories\Collaborators;

use App\Models\Collaborators;
use Illuminate\Database\Eloquent\Collection;

class CollaboratorsRepository implements CollaboratorRepositoryContract
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
     * @return \Illuminate\Database\Eloquent\Collection
     */
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
