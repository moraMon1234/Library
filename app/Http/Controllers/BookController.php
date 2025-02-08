<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view ("index",compact("books"));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $name = $request->name;
        $description = $request->description;
        $price = $request->price;


        $data=[
            'name' =>$name,
            'description' =>$description,
            'price' =>$price
        ];

        // dd("you are in success route");

        Book::create($data);
        return redirect('books/index');
        // echo "Success, You created a new book";

    }

}
