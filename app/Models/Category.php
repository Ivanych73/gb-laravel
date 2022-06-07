<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
		'title', 'description'
	];

    public function news()
    {
        return $this->belongsToMany(News::class, 'categories_news');
    }
}
