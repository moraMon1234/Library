<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function book()
    {
        $books = Book::with('author')->get(); 
        return view("book", compact("books"));
    }


    public function create()
    {
        $authors = Author::all(); 
        return view('create', compact('authors'));
    }

    /**
     * تخزين كتاب جديد.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id', // التأكد من صحة المؤلف
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '_library.' . $extension;
            $image->move(public_path('images'), $filename);
        }

        Book::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'author_id' => $request->author_id, // ربط الكتاب بالمؤلف
        ]);

        return redirect('/book')->with('success', 'تم إنشاء الكتاب بنجاح!');
    }

    public function update($id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all(); 
        return view("update", compact("book", "authors"));
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
        ]);

        $book = Book::findOrFail($request->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = time() . '_library.' . $extension;
            $image->move(public_path('images'), $filename);
        } else {
            $filename = $book->image; 
        }

        $book->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'author_id' => $request->author_id, 
        ]);

        return redirect('/book')->with('success', 'The update is success');
    }


    public function delete($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();
            return redirect('/book')->with('success', 'The book is deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'error ' . $e->getMessage());
        }
    }
}
