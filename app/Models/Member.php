<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address'];

    public function borrowings()
    {
        return $this->hasMany(Borrower::class);
    }
}
