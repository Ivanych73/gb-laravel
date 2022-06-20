<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderCategories implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Category::query();
    }

    public function listCategories(array $columns = []): Collection
    {
        if (count($columns)) {
            return Category::get($columns);
        } else {
            return Category::get();
        }
    }

    public function listCategoriesWithNews(array $columns = []): Collection
    {
        if (count($columns)) {
            return Category::withCount('news')->havingRaw('news_count > 0')->get($columns);
        } else {
            return Category::withCount('news')->havingRaw('news_count > 0')->get();
        }
    }

    public function getCategoryDetailById(int $categoryId, array $columns = []): Collection
    {
        if (count($columns)) {
            return Category::whereId($categoryId)->get($columns);
        } else {
            return Category::whereId($categoryId)->get();
        }
    }

    public function listNewsByCategory(int $categoryId): LengthAwarePaginator
    {
        return Category::select('categories.title as category_title', 'news.id', 'news.title', 'annotation', 'slug')
            ->where('status', 'active')
            ->where('categories.id', $categoryId)
            ->join('categories_news', 'categories.id', '=', 'category_id')
            ->join('news', 'news.id', '=', 'news_id')
            ->paginate(6);
    }
}
