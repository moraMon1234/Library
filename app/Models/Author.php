<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'bio', 'job_description', 'profile_image'];

    public function book()
    {
        return $this->hasOne(Book::class);
    }
}

