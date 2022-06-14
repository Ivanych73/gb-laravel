<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class QueryBuilderNews implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return News::query();
    }

    public function listNews(array $columns = []): LengthAwarePaginator
    {
        if (count($columns)) {
            return News::with(['authors', 'categories'])->select($columns)->paginate(20);
        } else {
            return News::with(['authors', 'categories'])->paginate(20);
        }
    }

    public function showNewsDetailBySlug(string $slug, array $columns = []): Model
    {
        if (count($columns)) {
            return News::where('slug', $slug)->with(['authors', 'categories'])->select($columns)->get()->first();
        } else {
            return News::where('slug', $slug)->with(['authors', 'categories'])->get()->first();
        }
    }

    public function showNewsDetailById($newsId, array $columns = []): Model
    {
        if (count($columns)) {
            return News::with(['authors', 'categories'])->select($columns)->findOrFail($newsId);
        } else {
            return News::with(['authors', 'categories'])->findOrFail($newsId);
        }
    }
}
