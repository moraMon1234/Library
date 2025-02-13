<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Book;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('books')->get(); 
        return view("student.student", compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all(); 
        return view("student.create", compact("books"));
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'phone' => 'required|numeric',

        ]);

        
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;


        $date = [
            'name' => $name,
            'email' => $email,
            'phone'=> $phone
            ];
    
         Student::create($date);

        return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('books')->findOrFail($id); 
        return view('student.show', compact('student'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id); 
        $books = Book::all(); 
        return view('student.update', compact("student", "books"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'id' => 'required|exists:students,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            
        ]);
    
        $student = Student::findOrFail($request->id);
    
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,

        ]);
    
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return redirect('/student');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


    public function search(Request $request)
    {
  
      $query = $request->input('query');
      $students = Student::where('name', 'like', "%{$query}%")->get();
      return view('student.student', compact('students'));
      
    }
}