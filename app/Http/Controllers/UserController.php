<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Books;
use App\Models\Rent;
use App\Models\RentRead;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = Users::all();
        return view('users.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $userId)
    { 
        $request->validate([
        'book' => 'required'
    ]);
   

    foreach ($request->book as $book) {
        $rent = new Rent;
        $rent->book_id = $book;
        $rent->user_id = $userId;
    
    $rent->save();
    }
    
   
        return redirect()->back()->with('success', 'All books rented successfully');

    
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $data['users'] = Users::find($userId);
        $data['rent'] = RentRead::where('user_id', $userId)->get();
        $data['books'] = Books::all();
        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
  

    $rent = Rent::find($id);

    if ($rent) {
        $rent->return_date = date('Y-m-d H:i:s');
        $rent->save();
     
      
    }
    return redirect()->back()->with('message', 'You have successfully updated the rent');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}