<?php

namespace App\Providers;

use App\Queries\QueryBuilderCategories;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, QueryBuilderCategories::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderNews::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderAuthors::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderFeedbacks::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderOrders::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderUsers::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
