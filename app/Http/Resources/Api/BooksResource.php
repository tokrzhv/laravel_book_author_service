<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $author = new AuthorsResource($this->author);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author_id' => $this->author_id,
            'author' => $author->name,
            'main_image' => $this->main_image,
            'registration_timestamp' => $this->created_at->diffForHumans(),

        ];
    }
}
