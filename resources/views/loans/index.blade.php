@extends('layouts.app')

@section('title', 'Gerenciar Empréstimos')

@section('content')
<h2>Empréstimos</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#novoEmprestimoModal">Novo</a>
<div class="modal fade" id="novoEmprestimoModal" tabindex="-1" aria-labelledby="novoEmprestimoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="novoEmprestimoModalLabel">Novo Empréstimo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('loans.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="client_registration_number" class="form-label">Usuário</label>
                        <select class="form-select" name="client_registration_number" required>
                            <option value="">Selecione um usuário</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->registration_number }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="book_registration_number" class="form-label">Livro</label>
                        <select class="form-select" name="book_registration_number" required>
                            <option value="">Selecione um livro</option>
                            @foreach($books as $book)
                                <option value="{{ $book->registration_number }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Data de Devolução</label>
                        <input type="date" class="form-control" name="due_date" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Livro</th>
            <th>Data de Empréstimo</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($loans as $loan)
        <tr>
            <td>{{ $loan->id }}</td>
            <td>{{ $loan->client_registration_number }}</td>
            <td>{{ $loan->book_registration_number }}</td>
            <td>{{ \Carbon\Carbon::parse($loan->due_date)->format('d/m/Y') }}</td>
            <td>{{ $loan->status }}</td>
            <td>
                <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <button type="submit" name="status" value="Devolvido" class="btn btn-success btn-sm" style="width: 150px;">Devolvido</button>
                    <button type="submit" name="status" value="Atrasado" class="btn btn-danger btn-sm" style="width: 150px;">Atrasado</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
