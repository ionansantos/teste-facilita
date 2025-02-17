<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = ['client_registration_number', 'book_registration_number', 'due_date', 'status'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_registration_number', 'registration_number');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_registration_number', 'registration_number');
    }
}
