<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'author_id','student_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

