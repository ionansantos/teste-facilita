<?php

namespace App\Services;

use App\Repository\BookRepository;

class BookService
{
    public function __construct(protected BookRepository $bookRepository) {}

    public function findAll() {
        return $this->bookRepository->findAll();
    }

    public function findOne($id) {
        return $this->bookRepository->findOne($id);
    }

    public function new($data) {
        if ($data) {
            $data['registration_number'] = strtoupper(uniqid('BOOK-'));
            $book = $this->bookRepository->new($data);
            return $book;
        }
    }

    public function updateBook($request, $id) {
        $book = $this->bookRepository->findOne($id);
        if (!$book) {
            throw new \Exception('erro ao atualizar!');
        }
        $requestAttributes = $request->all();
        $this->bookRepository->update($id, $requestAttributes);
        $book->save();
    }

    public function destroy($id) {
        if($id) {
            $book = $this->bookRepository->findOne($id);
            if ($book) {
                $this->bookRepository->delete($id);

                return redirect()->back();
            }
        }

        return redirect()->back();
    }
}
