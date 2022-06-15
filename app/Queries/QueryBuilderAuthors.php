<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Author;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderAuthors extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(Author $model)
    {
        $this->model = $model;
    }
}
