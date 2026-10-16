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
        $book = Books::find($id);

         return response()->json([
            'success' => true,
            'message' => 'Book found successfully!',
            'data' => $book
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //       $student = Student::find($request->id);
    //     $validated= $request->validate([
    //         'firstname'=>'required|max:100',
    //         'middlename'=>'required|max:100',
    //         'lastname'=>'required|max:100',
    //         'contact_number'=>'required|max:100',
    //         'course'=>'required|max:100',
    //         'year'=>'required|max:100'
    //     ]);
    //   $student->update($validated);
    $books = Books::find($id);
    $validated= $request->validate([
        'title'=>'required',
        'author'=>'required'
    ]);
    $books->update($validated);
     return response()->json([
            'success' => true,
            'message' => 'Book updated successfully!',
        ], 201);
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
