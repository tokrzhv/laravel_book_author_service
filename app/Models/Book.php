<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'author_id',
        'main_image',
    ];

    protected $guarded = false;

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
    public function formattedCreatedAt()
    {
        return $this->created_at->diffForHumans();
    }
}
