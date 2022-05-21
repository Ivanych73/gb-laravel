<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;

class PagesTest extends TestCase
{

    public function testCheckCategoriesList()
    {
        //В боевой системе выберем гарантированно существующий id
        $id = 6;
        $response = $this->get("/categories/$id");

        $response->assertStatus(200);
        $response->assertViewIs('news.newslist');
    }

    public function testCheckCategories()
    {
        //В боевой системе выберем гарантированно существующий id
        $id = 6;
        $response = $this->get("/categories/$id");

        $response->assertStatus(200);
        $response->assertViewIs('news.newslist');
    }

    public function testCheckCategoriesValidateIdExists()
    {
        //В боевой системе выберем гарантированно НЕ существующий id
        $id = 45;
        $response = $this->get("/categories/$id");

        $response->assertNotFound();
    }

    public function testCheckCategoriesValidateIdIsNumber()
    {
        $response = $this->get("/categories");

        $response->assertStatus(200);
        $response->assertViewIs('news.categorieslist');
    }
}
