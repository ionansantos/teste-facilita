<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Models\Loans;
use App\Services\LoanService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function __construct(protected LoanService $service) {}

    public function index()
    {
        $loans = $this->service->findAll();
        $data = $this->service->getUsersAndBooks();
        return view('loans.index', array_merge(compact('loans'), $data));
    }

    public function store(LoanRequest $request) {
        try{
            $this->service->new($request->all());
            return redirect()->route('loans.index')->with("success" ,"emprestimo feito com sucesso");
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Erro cadastra emprestimo!');
        };
    }

    public function edit(Loans $loan) {
        return view('loans.edit', compact('loan'));
    }

    public function update(Request $request, $id) {
        try {
            $this->service->updateLoanStatus($request->status, $id);
            return redirect()->route('loans.index')->with('success', 'Status atualizado!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar status: ' . $e->getMessage());
        }
    }
}
