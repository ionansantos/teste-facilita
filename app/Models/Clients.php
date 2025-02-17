<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Clients extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'registration_number'];

    public function loans()
    {
        return $this->hasMany(Loans::class);
    }
}
