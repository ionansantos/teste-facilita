<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Books;
use App\Services\BookService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(protected BookService $service) {}

    public function index()
    {
        $books = Books::all();
        return view('books.index', compact('books'));
    }

    public function store(Request $request) {
        try{
            $this->service->new($request->all());
            return redirect()->route('books.index')->with("success" ,"livro cadastro com sucesso");
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar livro');
        };
    }

    public function edit(Books $book) {
        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $request, $id) {
        try {
            $this->service->updateBook($request, $id);
            return redirect()->route('books.index')->with('success', 'livro atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar livro: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $book = $this->service->findOne($id);
        if (!$book) {
            return redirect()->back()->with('error', 'Erro ao excluir registro: ' . $e->getMessage());
        }

        $this->service->destroy($id);

        return redirect()->route('books.index')->with('success', 'Registro excluído com sucesso!');
    }
}
