<?php

namespace App\Repository;

use App\Models\Clients;
use  App\Repository\AbstractRepository;

class ClientRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Clients();
    }
}
