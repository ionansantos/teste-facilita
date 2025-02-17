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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = $this->service->findAll();
        $data = $this->service->getUsersAndBooks();
        return view('loans.index', array_merge(compact('loans'), $data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(LoanRequest $request) {
        try{
            $loan = $this->service->new($request->all());
            return response()->json(["message" => "empréstimo criado com sucesso", "data" => $loan], Response::HTTP_CREATED);
        } catch(\Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 422);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
