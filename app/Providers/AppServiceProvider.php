<?php

namespace App\Providers;

use App\Queries\QueryBuilderCategories;
use App\Services\Contract\Social;
use App\Services\SocialService;
use App\Services\Contract\Parser;
use App\Services\ParserService;
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

        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Upload::class, UploadService::class);
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
