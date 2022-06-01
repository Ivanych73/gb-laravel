<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilder;
use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderNews;

class NewsController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function listNewsByCategory(int $categoryId, QueryBuilderCategories $newsList)
    {
        $list = $newsList->listNewsByCategory($categoryId);
        $categoryTitle = $list->first()['category_title'];
        return view('news.newslist', [
            'newsList' => $list,
            'categoryTitle' => $categoryTitle
        ]);
    }

    public function showNewsDetailById(int $newsId, QueryBuilderNews $newsDetail)
    {
        $list = [];
        $article = $newsDetail->showNewsDetailById($newsId)->toArray();
        foreach ($article['authors'] as $author) {
            $list[] = $author['first_name'] . ' ' . $author['last_name'];
        }
        $article['authors'] = implode(", ", $list);
        $list = [];
        foreach ($article['categories'] as $category) {
            $list[] = $category['title'];
        }
        $article['categories'] = implode(", ", $list);
        return view('news.detail', ['article' => $article]);
    }

    public function listCategories(QueryBuilderCategories $categoriesList)
    {
        return view('news.categorieslist', [
            'categoriesList' => $categoriesList->listCategories(['id', 'title'])
        ]);
    }
}
