<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsingJob;
use App\Models\EloquentModels\Resource;
use Illuminate\Http\Request;
use App\Services\Interfaces\Parser;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService)
    {
        $links = Resource::query()->get();
        /*$links = [
            'lentaRSS' => 'https://lenta.ru/rss',
            'komersantRSS' => 'https://www.kommersant.ru/RSS/corp.xml',
            'ramblerRSS1' => 'https://news.rambler.ru/rss/world/',
            'ramblerRSS2' => 'https://news.rambler.ru/rss/community/',
            'ramblerRSS3' => 'https://news.rambler.ru/rss/politics/',
            'ramblerRSS4' => 'https://news.rambler.ru/rss/incidents/',
            'ramblerRSS5' => 'https://news.rambler.ru/rss/tech/',
            'ramblerRSS6' => 'https://news.rambler.ru/rss/army/',
            'ramblerRSS7' => 'https://news.rambler.ru/rss/games/',
            'ramblerRSS8' => 'https://news.rambler.ru/rss/starlife/',
            'ramblerRSS9' => 'https://news.rambler.ru/rss/articles/',
            'AiFRSS' => 'https://aif.ru/rss/paper.php',
        ];*/

        foreach ($links as $link) {

            dispatch(new NewsParsingJob($link->resource_url));
        }

        return redirect(route('news.index'));
    }
}
