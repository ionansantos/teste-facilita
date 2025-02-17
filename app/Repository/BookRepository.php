<?php

namespace App\Repository;

use App\Models\Books;
use  App\Repository\AbstractRepository;

class BookRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Books();
    }

    public function new($data)
    {
        return $this->model->create($data);
    }
}
