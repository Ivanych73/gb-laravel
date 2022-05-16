<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function listNewsByCategory($categoryId)
    {
        $newsList = $this->getNews(null, $categoryId);
        if (count($newsList) == 0) {
            abort(404);
        }
        $categoryTitle = $this->getCategoryTitleById($categoryId);
        return view('news.newslist', [
            'newsList' => $newsList,
            'categoryTitle' => $categoryTitle
        ]);
    }

    public function showNewsDetailById($newsId)
    {
        $article = $this->getNews($newsId);
        if (count($article) == 0) {
            abort(404);
        }
        return view('news.detail', ['article' => $article]);
    }

    public function listCategories()
    {
        $categoriesList = $this->getCategories();
        return view('news.categorieslist', ['categoriesList' => $categoriesList]);
    }
}
