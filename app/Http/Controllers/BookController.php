<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function book()
    {
        $books = Book::with(['author', 'student'])->get(); 
        return view("book.book", compact("books"));
    }

    public function create()
    {
        $authors = Author::all(); 
        $students = Student::all(); 
        $categories = Category::all(); 

        return view('book.create', compact('authors', 'students', 'categories'));
    }

    public function show($id)
    {
        $book = Book::with('categories')->findOrFail($id);
        $categories = Category::all(); 
        return view('book.show', compact('book', 'categories'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'student_id' => 'exists:students,id',
            'categories' => 'required|array', 
            'categories.*' => 'exists:categories,id',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_book.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $filename, 'public');
        }

        $book = Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'author_id' => $request->author_id,
            'student_id' => $request->student_id,
        ]);

        $book->categories()->attach($request->categories);

        return redirect('/book');
    }

    public function update($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all(); 
        $students = Student::all();
        $categories = Category::all(); 
        $selectedCategories = $book->categories->pluck('id')->toArray();

        return view("book.update", compact("book", "authors", "students", "categories", "selectedCategories"));
    }

    public function execute(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:books,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'student_id' => 'exists:students,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $book = Book::findOrFail($request->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_book.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $filename, 'public');
        }else {
            $filename = $book->image;
        }

        $book->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'author_id' => $request->author_id,
            'student_id' => $request->student_id,
        ]);

        $book->categories()->sync($request->categories);

        return redirect('/book');
    }

    public function delete($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->categories()->detach(); 
            $book->delete();
            return redirect('/book');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $books = Book::with(['author', 'student'])
                     ->where('name', 'like', "%{$query}%")
                     ->get();
        return view('book.book', compact('books'));
    }
    
}
