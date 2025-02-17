<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name' => 'João Silva',
                'email' => 'joao@example.com',
                'registration_number' => 'USER-65B2CCE43EF09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maria Oliveira',
                'email' => 'maria@example.com',
                'registration_number' => 'USER-67B2CCE43EG01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carlos Souza',
                'email' => 'carlos@example.com',
                'registration_number' => 'USER-6GB2CCE43EF03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
