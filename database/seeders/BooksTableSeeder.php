<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'name' => 'O Senhor dos Anéis',
                'author' => 'J.R.R. Tolkien',
                'registration_number' => 'BOOK-65B2CCED2B598',
                'genre' => 'Fantasia',
                'status' => 'Disponível',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dom Casmurro',
                'author' => 'Machado de Assis',
                'registration_number' => 'BOOK-57B2CCED7B598',
                'genre' => 'Romance',
                'status' => 'Disponível',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Harry Potter e a Pedra Filosofal',
                'author' => 'J.K. Rowling',
                'registration_number' => 'BOOK-37B2CCED1B534',
                'genre' => 'Fantasia',
                'status' => 'Disponível',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
