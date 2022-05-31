<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        return view('book.book-index');
    }

public function create(){
    return view('book.book-create');
}


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',#
            'author'=>'required',
            'status'=>'required'
        ]);
        $book=Book::create(
            $request->only('title','author')
        );

        $request->user()->books()->attach($book,[
            'status'=>$request->status
        ]);

        return redirect('/');
    }


}
