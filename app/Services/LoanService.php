<?php

namespace App\Services;

use App\Models\{
    Books,
    Clients,
    Loans,
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
        $availableBooks = Books::whereNotIn('registration_number', function ($query) { //  filtra apenas os livros disponiveis
            $query->select('book_registration_number')
                  ->from('loans')
                  ->whereIn('status', ['Emprestado', 'Atrasado']);
        })->get();

        return [
            'clients' => Clients::all(),
            'books' => $availableBooks,
        ];
    }

    public function findOne($id) {
        return $this->loanRepository->findOne($id);
    }

    public function new($data) {
        if ($data) {
            $client = Clients::where('registration_number', $data['client_registration_number'])->first();
            $book = Books::where('registration_number', $data['book_registration_number'])->first();

            if (!$client || !$book) {
                throw new \Exception('Cliente ou Livro não encontrado');
            }

            $data['status'] = 'Emprestado';

            $loan = $this->loanRepository->new($data);
            return $loan;
        }
    }

    public function updateLoanStatus($status, $id) {
        $loan = Loans::find($id);
        if (!$loan) {
            throw new \Exception('Empréstimo não encontrado!');
        }
        $loan->status = $status;
        $loan->save();
    }
}
