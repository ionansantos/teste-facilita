@extends('layouts.app')

@section('title', 'Gerenciar Livros')

@section('content')
<h2>Livros</h2>

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

<a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#novoLivroModal">Novo</a>
<div class="modal fade" id="novoLivroModal" tabindex="-1" aria-labelledby="novoLivroModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="novoLivroModal">Novo Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('books.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Livro</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div>

                    <div class="mb-3">
                        <label for="genre" class="form-label">Gênero</label>
                        <select class="form-select" name="genre" required>
                            <option value="">Selecione o gênero</option>
                            <option value="ficcao">Ficção</option>
                            <option value="comedia">Comédia</option>
                            <option value="romance">Romance</option>
                            <option value="fantasia">Fantasia</option>
                            <option value="aventura">Aventura</option>
                            <option value="historico">Histórico</option>
                            <option value="biografia">Biografia</option>
                            <option value="suspense">Suspense</option>
                            <option value="misterio">Mistério</option>
                            <option value="terror">Terror</option>
                            <option value="autoajuda">Autoajuda</option>
                        </select>
                    </div>


                    <!-- Botões -->
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
            <th>Número de Registro</th>
            <th>Nome</th>
            <th>Autor</th>
            <th>Gênero</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->registration_number }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->genre }}</td>
            <td>{{ $book->status }}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
