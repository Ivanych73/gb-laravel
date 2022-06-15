<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderUsers extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
