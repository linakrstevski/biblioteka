<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Users;
use App\Models\Rent;
use App\Models\RentRead;



class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // $url='http://localhost:8888/biblioteka/public/book';
        $data['books'] = Books::all();
        $data['users'] = Users::all();

        return view('books.list', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $book)
    {
        { 
            $request->validate([
            'user' => 'required'
        ]);
       
    
        foreach ($request->user as $user) {
            $rent = new Rent;
            $rent->book_id = $book;
            $rent->user_id = $user;
        
        $rent->save();
        }
        
       
            return redirect()->back()->with('success', 'All books rented successfully');
    
        
    }
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $bookId)
    {
                
       $data['rent'] = RentRead::where('book_id', $bookId)->get();
        $data['book'] = Books::find($bookId);
        $data['users'] = Users::all();
        return view('books.show', $data); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
