<?php

declare(strict_types=1);

namespace App\Queries;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class QueryBuilderBase implements QueryBuilder
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    public function getBuilder(): Builder
    {
        return $this->model::query();
    }

    public function listItems(array $columns = []): Collection
    {
        if (count($columns)) {
            return $this->model::get($columns);
        } else {
            return $this->model::get();
        }
    }

    public function getItemDetailById(int $itemId, array $columns = []): Collection
    {
        if (count($columns)) {
            return $this->model::whereId($itemId)->get($columns);
        } else {
            return $this->model::whereId($itemId)->get();
        }
    }
}
