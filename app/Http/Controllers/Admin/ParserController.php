<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\Parser;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parserService)
    {
        $links = [
            'url' => 'https://lenta.ru/rss',
            'url2' => 'https://news.rambler.ru/rss/tech/',
        ];

        foreach ($links as $link) {
            $parserService->setLink($link)->saveParseData();
        }

        return redirect(route('admin.index'));
    }
}
