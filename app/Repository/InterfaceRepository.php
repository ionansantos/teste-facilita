<?php

namespace App\Repository;

interface InterfaceRepository
{
    public function findAll();
    public function findOne($id);
    public function new($data);
    public function update($id, $request);
    public function delete($id);
}
