<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Author;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderAuthors implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Author::query();
    }

    public function listAuthors(array $columns = []): Collection
    {
        if (count($columns)) {
            return Author::get($columns);
        } else {
            return Author::get();
        }
    }

    public function getAuthorDetailById(int $authorId, array $columns = []): Collection
    {
        if (count($columns)) {
            return Author::whereId($authorId)->get($columns);
        } else {
            return Author::whereId($authorId)->get();
        }
    }
}
