<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contract\Parser;
use App\Services\ParserService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ParserService $parser)
    {
        return view(
            'admin.parser.index',
            [
                'parsed' => $parser->setLink('https://news.yandex.ru/science.rss')->parse()
            ]
        );
    }
}
