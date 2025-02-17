<?php

namespace App\Repository;

use App\Models\Loans;
use  App\Repository\AbstractRepository;

class LoanRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Loans();
    }
}
