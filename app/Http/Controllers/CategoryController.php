<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('books')->get(); 
        return view("category.category", compact("categories"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all(); 
        return view("category.create", compact("books"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);
        
        $name = $request->name;
        $description = $request->description;

        $date = [
            'name' => $name,
            'description' => $description,
            ];
    
         Category::create($date);

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::with('books')->findOrFail($id); 
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id); 
        $books = Book::all(); 
        return view('category.update', compact("category", "books"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);
        
        $category = Category::findOrFail($request->id);


        $category->update ([
            'name' => $request->name,
            'description' => $request->description,
            ]);
    
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect('/category');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
  
      $query = $request->input('query');
      $categories = Category::where('name', 'like', "%{$query}%")->get();
      return view('category.category', compact('categories'));
      
    }
}
