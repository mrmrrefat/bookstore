<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Http\Resources\BooktResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view("" , ['books'=>Auth::user()->books]);
        $book=Book::all();
        // dd($book);
        return BooktResource::collection($book);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('');
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
        // dd($request->all()); هتعرض الداتا اللي راجعه من الفورم
        dd(Auth::id());
        $validated = $request->validate([
            'name' => 'required|unique:tracks|max:3',
            'description' => 'required',
        ]);
          $book=new Book();
          $book->id=$request->id;
          $book->name=$request->name;
          $book->description=$request->description;
          $book->price=$request->price;
          $book->image=$request->image;
        //   $book->created_at=$request->created_at;
        //   $book->updated_at=$request->updated_at;
          $book->save();
        //   return redirect('/tracks');
        return back()->with ('success_message','Book created successefully');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
        $validated = $request->validate([
            'name' => 'required|unique:tracks|max:3',
            'description' => 'required',
        ]);
        $book= Book::findOrFail($id);

          $book->name=$request->name;
          $book->description=$request->description;
          $book->price=$request->price;
          $book->image=$request->image;
          $book->save();
          return redirect('');
      
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
        $book= Book::find($id);
        $book->delete();
        return back();
    }
}
