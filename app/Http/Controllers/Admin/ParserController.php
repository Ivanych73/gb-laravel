<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parser\ParseNewsRequest;
use App\Queries\QueryBuilderSources;
use App\Services\ParserService;

class ParserController extends Controller
{
    public function parseNews(ParseNewsRequest $request, ParserService $parser, QueryBuilderSources $sources)
    {
        $sources = $sources->listSourcesById($request->validated()['ids'], ['id', 'url']);
        return view(
            'admin.parser.news',
            [
                'parsed' => $parser->parseMultiple($sources)
            ]
        );
    }

    public function showSources(QueryBuilderSources $sourcesList)
    {
        return view(
            'admin.parser.sources',
            [
                'sources' => $sourcesList->listSourcesWithUrl(['id', 'title', 'description', 'url'])
            ]
        );
    }

    public function storeNews($news)
    {
        dd($news);
    }
}
