<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::first()->paginate(5);
    }

    public function getByTitle($value)
    {
        return Book::where('title', $value)->get();
    }

    public function getById($id)
    {
        try{

            $book = Book::find($id);
            return response()->json(['message'=>'Done',
            'book'=>$book,
            'user'=>$book->user]);

        }catch(Exception $e){

            return response()->json(['message'=> $e->getMessage()]);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Book::create($request->all());
        return 'done';
    }

    public function postBookWAuthor(Request $request, $author_id)
    {
        try{

            $book = Book::create($request->all());
            $book->author()->attach($author_id);
            return response()->json(['message'=>'Done','book'=>$book,'author'=>$book->author]);

        }catch(Exception $e){

            return response()->json(['message'=> $e->getMessage()]);

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Book::where('id', $request->id)->update($request->all());
        return 'update done';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::where('id',$id)->delete();
        return 'delete done';
    }
}
