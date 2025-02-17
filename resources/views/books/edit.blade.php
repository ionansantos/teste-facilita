@extends('layouts.app')

@section('title', 'Editar Livro')

@section('content')
<h2>Editar Livro</h2>

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

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}" required>
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Autor</label>
        <input type="author" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
    </div>

    <div class="mb-3">
        <label for="genre" class="form-label">Gênero</label>
        <input type="genre" class="form-control" id="genre" name="genre" value="{{ $book->genre }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
