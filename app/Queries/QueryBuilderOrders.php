<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Order;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderOrders extends QueryBuilderBase implements QueryBuilder
{
    public function __construct(Order $model)
    {
        $this->model = $model;
    }
}
