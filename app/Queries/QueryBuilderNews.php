<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class QueryBuilderNews extends QueryBuilderBase implements QueryBuilder
{

    public function __construct(News $model)
    {
        $this->model = $model;
    }

    public function listNews(array $columns = []): LengthAwarePaginator
    {
        if (count($columns)) {
            return $this->model::with(['authors', 'categories'])->select($columns)->paginate(20);
        } else {
            return $this->model::with(['authors', 'categories'])->paginate(20);
        }
    }

    public function showNewsDetailBySlug(string $slug, array $columns = []): Model
    {
        if (count($columns)) {
            return $this->model::where('slug', $slug)->with(['authors', 'categories'])->select($columns)->get()->first();
        } else {
            return $this->model::where('slug', $slug)->with(['authors', 'categories'])->get()->first();
        }
    }

    public function showNewsDetailById($newsId, array $columns = []): Model
    {
        if (count($columns)) {
            return $this->model::with(['authors', 'categories'])->select($columns)->findOrFail($newsId);
        } else {
            return $this->model::with(['authors', 'categories'])->findOrFail($newsId);
        }
    }
}
