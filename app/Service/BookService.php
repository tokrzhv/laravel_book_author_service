<?php

namespace App\Service;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }
            Book::firstOrCreate($data);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $book)
    {
        try {
            DB::beginTransaction();

            if (isset($data['main_image']) && isset($book->main_image)) {
                Storage::disk('public')->delete($book->main_image);
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);

            } else if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('images', $data['main_image']);
            }

            $book->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

}
