<?php

namespace App\Services;

use App\Models\{
    Books,
    Clients,
};
use App\Repository\LoanRepository;

class LoanService
{
    public function __construct(protected LoanRepository $loanRepository) {}

    public function findAll() {
        return $this->loanRepository->findAll();
    }

    public function getUsersAndBooks()
    {
        return [
            'clients' => Clients::all(),
            'books' => Books::all()
        ];
    }

    public function findOne($id) {
        return $this->loanRepository->findOne($id);
    }
    public function new() {}
    public function update() {}
    public function destroy() {}
}
