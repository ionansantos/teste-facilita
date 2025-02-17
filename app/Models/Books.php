<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author', 'registration_number', 'status', 'genre', 'client'];

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client');
    }
}
