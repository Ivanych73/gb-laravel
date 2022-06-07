<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Feedback;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderFeedbacks implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Feedback::query();
    }

    public function listFeedbacks(array $columns = []): Collection
    {
        if (count($columns)) {
            return Feedback::get($columns);
        } else {
            return Feedback::get();
        }
    }

    public function getFeedbackDetailById(int $feedbackId, array $columns = []): Collection
    {
        if (count($columns)) {
            return Feedback::whereId($feedbackId)->get($columns);
        } else {
            return Feedback::whereId($feedbackId)->get();
        }
    }
}