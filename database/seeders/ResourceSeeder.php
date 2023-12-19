<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resources')->insert($this->getData());
    }

    public function getData(): array
    {

        return [
            [
                'resource_title' => 'lentaRSS',
                'resource_url' => 'https://lenta.ru/rss',
                'created_at' => now()
            ],

            [
                'resource_title' => 'komersantRSS',
                'resource_url' => 'https://www.kommersant.ru/RSS/corp.xml',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS1',
                'resource_url' => 'https://news.rambler.ru/rss/world/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS2',
                'resource_url' => 'https://news.rambler.ru/rss/community/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS3',
                'resource_url' => 'https://news.rambler.ru/rss/politics/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS4',
                'resource_url' => 'https://news.rambler.ru/rss/incidents/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS5',
                'resource_url' => 'https://news.rambler.ru/rss/tech/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS6',
                'resource_url' => 'https://news.rambler.ru/rss/army/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS7',
                'resource_url' => 'https://news.rambler.ru/rss/games/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS8',
                'resource_url' => 'https://news.rambler.ru/rss/starlife/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'ramblerRSS9',
                'resource_url' => 'https://news.rambler.ru/rss/articles/',
                'created_at' => now()
            ],

            [
                'resource_title' => 'AiFRSS',
                'resource_url' => 'https://aif.ru/rss/paper.php',
                'created_at' => now()
            ],
        ];
    }
}
