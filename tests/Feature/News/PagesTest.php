<?php

namespace Tests\Feature\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    public function testCheckNews()
    {
        //В боевой системе выберем гарантированно существующий id
        $id = 22;
        $response = $this->get("/news/$id");

        $response->assertStatus(200);
        $response->assertViewIs('news.detail');
    }

    public function testCheckNewsValidateIdExists()
    {
        //В боевой системе выберем гарантированно НЕ существующий id
        $id = 45;
        $response = $this->get("/news/$id");

        $response->assertNotFound();
    }

    public function testCheckNewsValidateIdIsNumber()
    {
        //Выберем id не являющийся числом
        $id = "id";
        $response = $this->get("/news/$id");

        $response->assertNotFound();
    }
}

