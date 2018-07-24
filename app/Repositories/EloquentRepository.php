<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function paginate($limit)
    {
        return $this->model->paginate($limit);
    }

    public function find($id)
    {
        try {
            $result = $this->model->findOrFail($id);

            return $result;
        } catch (\Exceptionn $exception) {
            return response()->view('errors.404');
        }
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $result = $this->find($id);
        try {
            $result->update($attributes);
        } catch (\Exception $exception) {
            return response()->view('errors.404');
        }
    }

    public function delete($id)
    {
        $result = $this->find($id);
        try {
            $result->delete();
        } catch (\Exception $exception) {
            return response()->view('errors.404');
        }
    }
}
