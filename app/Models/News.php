<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory, Sluggable;

    protected $table = "news";
    protected $fillable = ['title', 'annotation', 'content', 'status', 'image_url', 'source_id', 'slug'];

    public function categories()
    {
        return $this->BelongsToMany(Category::class, 'categories_news');
    }

    public function authors()
    {
        return $this->BelongsToMany(Author::class, 'authors_news');
    }

        /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
