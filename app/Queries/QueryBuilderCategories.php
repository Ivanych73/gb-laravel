<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderCategories extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function listCategoriesWithNews(array $columns = []): Collection
    {
        if (count($columns)) {
            return $this->model::withCount('news')->havingRaw('news_count > 0')->get($columns);
        } else {
            return $this->model::withCount('news')->havingRaw('news_count > 0')->get();
        }
    }

    public function listNewsByCategory(int $categoryId): LengthAwarePaginator
    {
        return $this->model::select('categories.title as category_title', 'news.id', 'news.title', 'annotation', 'slug')
            ->where('status', 'active')
            ->where('categories.id', $categoryId)
            ->join('categories_news', 'categories.id', '=', 'category_id')
            ->join('news', 'news.id', '=', 'news_id')
            ->paginate(6);
    }
}
