@extends('layouts.app')

@section('title', 'Gerenciar Usuários')

@section('content')
<h2>Usuários</h2>

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

<a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#novoClienteModal">Novo</a>
<div class="modal fade" id="novoClienteModal" tabindex="-1" aria-labelledby="novoClienteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="novoClienteModal">Cadastro de Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>
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
            <th>Nome</th>
            <th>Email</th>
            <th>Número de Cadastro</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->registration_number }}</td>
            <td>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form  action="{{ route('clients.destroy', $client->id) }}"   method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
