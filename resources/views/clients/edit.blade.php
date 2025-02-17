@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<h2>Editar Usuário</h2>

<form action="{{ route('clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $client->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $client->email }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
