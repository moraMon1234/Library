<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('book')->get(); 
        return view("author.author", compact("authors"));
    }

    public function create()
    {
        $books = Book::all(); 
        return view("author.create", compact("books"));
    }

    public function show($id)
    {
        $author = Author::with('book')->findOrFail($id);
        return view('author.show', compact('author'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'job_description' => 'required|string',
            'bio' => 'required|string',
            'books_id' => 'required|exists:books,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_author.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
        }

        Author::create([
            'name' => $request->name,
            'email' => $request->email,
            'job_description' => $request->job_description,
            'bio' => $request->bio,
            'books_id' => $request->books_id,
            'image' => $filename,
        ]);

        // return redirect()->route('author')->with('success', 'Author created successfully.');
        return redirect('/author')->with('success', 'تم إنشاء الكتاب بنجاح!');

    }

    public function edit($id)
    {
        $author = Author::findOrFail($id); 
        $books = Book::all(); 
        return view('author.update', compact("author", "books"));
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:authors,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'job_description' => 'required|string',
            'bio' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $author = Author::findOrFail($request->id);
    
        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $filename = time() . '_author.' . $profile_image->getClientOriginalExtension();
            $profile_image->move(public_path('images'), $filename);
        } else {
            $filename = $author->profile_image;
        }
    
        $author->update([
            'name' => $request->name,
            'email' => $request->email,
            'job_description' => $request->job_description,
            'bio' => $request->bio,
            'profile_image' => $filename,
        ]);
    
        return redirect('/author')->with('success', 'تم تحديث البيانات بنجاح!');
    }
    

    public function destroy($id)
    {
        try {
            $author = Author::findOrFail($id);
            $author->delete();
            return redirect('/author')->with('success', 'The book is deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'error ' . $e->getMessage());
        }
    }
}
