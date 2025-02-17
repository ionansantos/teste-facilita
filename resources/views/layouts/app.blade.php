<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Biblioteca')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" ">Biblioteca</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('clients.index') }}">Usuários</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Livros</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('loans.index') }}">Empréstimos</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
