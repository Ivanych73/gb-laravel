<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Feedback;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderFeedbacks extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }
}