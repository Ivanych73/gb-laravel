<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Faker\Factory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private array $categories;

    private array $news;

    public function __construct()
    {
        $faker = Factory::create();
        for ($i = 1; $i < 7; $i++) {
            $this->categories[] = [
                'id' => $i,
                'title' => $faker->colorName()
            ];
        }
        for ($i = 1; $i < 37; $i++) {
            $categoryId = $i % 6;
            if (!$categoryId) $categoryId = 6;
            $this->news[] = [
                'id' => $i,
                'categoryId' => $categoryId,
                'title' => $faker->jobTitle(),
                'author' => $faker->name(),
                'annotation' => $faker->text(25),
                'body' => $faker->text(200)
            ];
        }
    }

    public function getCategories()
    {
        return $this->categories;
    }

    protected function getCategoryTitleById($categoryId)
    {
        foreach ($this->categories as $value) {
            if ($value['id'] == $categoryId) {
                $res = $value['title'];
            }
        }
        return $res;
    }

    public function getNews(int $newsId = null, int $categoryId = null)
    {
        $res = [];
        if ($newsId && $categoryId) {
            $newsByCategory = $this->getNewsByCategory($categoryId);
            $res[] = $this->getNewsById($newsByCategory, $newsId);
        } else if ($categoryId) {
            $res = $this->getNewsByCategory($categoryId);
        } else {
            $res = $this->getNewsById($this->news, $newsId);
        }
        return $res;
    }

    protected function getNewsByCategory(int $categoryId)
    {
        $res = [];
        foreach ($this->news as $value) {
            if ($value['categoryId'] == $categoryId) {
                $res[] = $value;
            }
        }
        return $res;
    }

    protected function getNewsById(array $news, int $newsId)
    {
        $res = [];
        foreach ($news as $value) {
            if ($value['id'] == $newsId) {
                $res = $value;
                break;
            }
        }
        return $res;
    }
  
    public function about()
    {
        return view('about');
    }

    public function contacts()
    {
        return view('contacts');
    }
}
