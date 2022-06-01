<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Order;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderOrders implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Order::query();
    }

    public function listOrders(array $columns = []): Collection
    {
        if (count($columns)) {
            return Order::get($columns);
        } else {
            return Order::get();
        }
    }

    public function getOrderDetailById(int $orderId, array $columns = []): Collection
    {
        if (count($columns)) {
            return Order::whereId($orderId)->get($columns);
        } else {
            return Order::whereId($orderId)->get();
        }
    }
}
