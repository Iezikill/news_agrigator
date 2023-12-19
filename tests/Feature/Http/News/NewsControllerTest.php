<?php

namespace Tests\Feature\Http\News;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_News_One_1(): void
    {
        $response = $this->get('news/one/1');

        $response->assertSeeText('sport');
        $response->assertSeeText('accepted');
        $response->assertOk();
        $response->assertViewIs('blade.news.show');

    }

    public function test_News_One_2(): void
    {
        $response = $this->get('news/one/10');

        $response->assertSeeText('life');
        $response->assertSeeText('Monster');
        $response->assertOk();
        $response->assertViewIs('blade.news.show');

    }

    public function test_News_One_3(): void
    {
        $response = $this->get('news/one/7');

        $response->assertSeeText('business');
        $response->assertSeeText('Marijuana');
        $response->assertOk();
        $response->assertViewIs('blade.news.show');

    }


}
