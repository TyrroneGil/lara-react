<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\BookResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return BookResource::collection(Books::all());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title"=>'required',
            "author"=>'required'
        ]);
        
        $book = Books::create($validated);
        
    return response()->json([
            'success' => true,
            'message' => 'Book created successfully!',
            'data' => $book
        ], 201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
        $book = Books::find($id);
        $book->delete();
         return response()->json([
            'success' => true,
            'message' => 'Book deleted successfully!',
        ], 201);
    }
}
