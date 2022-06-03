<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderUsers implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return User::query();
    }

    public function listUsers(array $columns = []): Collection
    {
        if (count($columns)) {
            return User::get($columns);
        } else {
            return User::get();
        }
    }

    public function getAuthorDetailById(int $userId, array $columns = []): Collection
    {
        if (count($columns)) {
            return User::whereId($userId)->get($columns);
        } else {
            return User::whereId($userId)->get();
        }
    }
}
