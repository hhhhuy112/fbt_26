<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function update($id, array $attributes)
    {
        return parent::update($id, $attributes);
    }

    public function paginate($limit)
    {
        return parent::paginate($limit);
    }
}
