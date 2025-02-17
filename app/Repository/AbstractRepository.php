<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements InterfaceRepository
{

    protected Model $model;


    public function findAll()
    {
        return $this->model->all();
    }


    public function findOne($id)
    {
        return $this->model->find($id);
    }


    public function new($data)
    {
        return $this->model->create($data);
    }


    public function update($id, $request)
    {

        $data = $this->model->find($id);

        if (!$data) {
            throw new \Exception("registro não encontrado");
        }

        $data->update($request);

        return $data->save();
    }


    public function delete($id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            throw new \Exception("registro não encontrado");
        }

        $data->delete();

        $rec = $this->model->get();

        return $rec;
    }
}
