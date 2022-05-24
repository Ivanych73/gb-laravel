<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function listNewsByCategory($categoryId)
    {
        $newsList = [];
        $queryRes = DB::table('categories_news')
            ->join('news', 'news.id', '=', 'categories_news.news_id')
            ->select(['news.id', 'news.title', 'news.annotation'])
            ->where('categories_news.category_id', '=', $categoryId)
            ->groupBy('news.id')
            ->get()->all();
        foreach ($queryRes as $news) {
            $newsList[] = [
                'id' => $news->id,
                'title' => $news->title,
                'annotation' => $news->annotation
            ];
        }
        if (count($newsList) == 0) {
            abort(404);
        }
        $categoryTitle = DB::table('categories')
            ->select(['title'])
            ->where('id', '=', $categoryId)
            ->get()->all()[0]->title;
        return view('news.newslist', [
            'newsList' => $newsList,
            'categoryTitle' => $categoryTitle
        ]);
    }

    public function showNewsDetailById($newsId)
    {
        $article = [];
        $queryRes = DB::table('news')
            ->select(['title', 'content'])
            ->where('id', '=', $newsId)
            ->get()->all();

        if (count($queryRes) == 0) {
            abort(404);
        }

        $article['title'] = $queryRes[0]->title;
        $article['body'] = $queryRes[0]->content;

        $queryRes = DB::table('authors_news')
            ->join('authors', 'authors.id', '=', 'authors_news.author_id')
            ->select('authors.first_name', 'authors.last_name')
            ->where('authors_news.news_id', '=', $newsId)
            ->get()->all();
        if (count($queryRes) == 0) {
            $article['author'] = "Неизвестен";
        } else {
            $authors = [];
            foreach ($queryRes as $author) {
                $authors[] = $author->first_name . " " . $author->last_name;
            }
            $article['author'] = implode(', ', $authors);
        }
        return view('news.detail', ['article' => $article]);
    }

    public function listCategories()
    {
        $categoriesList = [];
        $queryRes = DB::table('categories')->select(['id', 'title'])->get()->all();
        foreach ($queryRes as $category) {
            $categoriesList[] = [
                'id' => $category->id,
                'title' => $category->title
            ];
        }
        return view('news.categorieslist', ['categoriesList' => $categoriesList]);
    }
}
