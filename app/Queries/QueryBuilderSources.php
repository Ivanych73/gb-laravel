<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Source;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderSources implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Source::query();
    }

    public function listSources(array $columns = []): Collection
    {
        if (count($columns)) {
            return Source::get($columns);
        } else {
            return Source::get();
        }
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

    public function getSourceDetailById(int $sourceId, array $columns = []): Collection
    {
        if (count($columns)) {
            return Source::whereId($sourceId)->get($columns);
        } else {
            return Source::whereId($sourceId)->get();
        }
    }
}
