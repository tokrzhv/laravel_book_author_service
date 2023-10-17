<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\ApiUpdateBookRequest;
use App\Http\Resources\Api\BooksResource;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController
{
    public function index(){
        try {
            $books = Book::all();

            return response()->json(BooksResource::collection($books), 200);

        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }

    }

    public function show($id){

        $user = Book::where('id', $id)->first();

        if ($user == null){
            return response()->json([
                'success' => false,
                'message' => 'The user with the requested identifier does not exist',
                'fails' => [
                    'user_id' => [
                        'User not found',
                    ]
                ],
            ], 404);
        }
        return response()->json(new BooksResource($user), 200);
        }

    public function update(ApiUpdateBookRequest $request, $id){
        try {
            $data = $request->validated();

            $book = Book::find($id);

            if ($book == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'The book with the requested identifier does not exist',
                    'fails' => [
                        'book_id' => [
                            'Book not found',
                        ]
                    ],
                ], 404);
            }

            if (isset($data['main_image']) && isset($book->main_image)) {
                Storage::disk('public')->delete($book->main_image);
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);

            } else if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }

            $book->update($data);

            return response()->json([
                'success' => true,
                'book_id' => $book->id,
                'message' => "Book successfully updated"
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }

    }

    public function destroy($id){
        try {
            $book = Book::find($id);

            if ($book == null) {
                return response()->json([
                    'success' => false,
                    'message' => 'The book with the requested identifier does not exist',
                    'fails' => [
                        'book_id' => [
                            'Book not found',
                        ]
                    ],
                ], 404);
            }

            if (isset($book->main_image)) {
                Storage::disk('public')->delete($book->main_image);
            }

            $book->delete();

            return response()->json([
                'success' => true,
                'post_id' => $book->id,
                'message' => "Book deleted successfully!",
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Page not found'
            ], 404);
        }
    }

}
