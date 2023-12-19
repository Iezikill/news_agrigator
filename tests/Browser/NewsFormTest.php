<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsFormTest extends DuskTestCase
{

    //use RefreshDatabase;
    /**
     * A Dusk test example.
     */
    public function testFormAddNews(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('author', '1')
                    ->scrollIntoView('button[type="submit"]')
                    ->waitUntilEnabled('button[type="submit"]')
                    ->press('Save')
                    ->assertSee('Количество символов в поле Автор должно быть не меньше 2.');
        });
    }

    public function testFormAddNewsWithDB(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', 'GeekBrains')
                ->type('description', 'GeekBrains')
                ->type('text', 'GeekBrains Laravel')
                ->type('author', 'GeekBrains')
                ->scrollIntoView('button[type="submit"]')
                ->waitUntilEnabled('button[type="submit"]')
                ->press('Save')
                ->assertPathIs('/admin/news')
                ->assertSee('News successfully added');
        });
    }

    public function testFormEditNews(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/1/edit')
                ->type('author', '1')
                ->scrollIntoView('button[type="submit"]')
                ->waitUntilEnabled('button[type="submit"]')
                ->press('Update')
                ->assertSee('Количество символов в поле Автор должно быть не меньше 2.');
        });
    }

    public function testFormAddCategory(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('name', '1')
                ->press('Save')
                ->assertSee('Количество символов в поле Наименование должно быть не меньше 3.');
        });
    }

    public function testFormAddCategoryWithDB(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('name', 'GeekBrains')
                ->type('description', 'GeekBrains')
                ->type('slug', 'GeekBrains Laravel')
                ->press('Save')
                ->assertPathIs('/admin/categories')
                ->assertSee('Category successfully added');
        });
    }

    public function testFormEditCategory(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/1/edit')
                ->type('name', '1')
                ->press('Update')
                ->assertSee('Количество символов в поле Наименование должно быть не меньше 3.');
        });
    }

}
