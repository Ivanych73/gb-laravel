<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Source;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderSources extends QueryBuilderBase implements QueryBuilder
{

    public function __construct(Source $model)
    {
        $this->model = $model;
    }

    public function listSourcesWithUrl(array $columns = []): Collection
    {
        if (count($columns)) {
            return Source::whereNotNull('url')->get($columns);
        } else {
            return Source::whereNotNull('url')->get();
        }
    }

    public function listSourcesById(array $ids, array $columns = []): Collection
    {
        if (count($columns)) {
            return Source::whereIn('id', $ids)->get($columns);
        } else {
            return Source::whereIn('id', $ids)->get();
        }
    }
}
