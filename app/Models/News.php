<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $fillable = ['title', 'annotation', 'content', 'status', 'image_url', 'source_id'];

    public function categories()
    {
        return $this->BelongsToMany(Category::class, 'categories_news');
    }

    public function authors()
    {
        return $this->BelongsToMany(Author::class, 'authors_news');
    }
}
