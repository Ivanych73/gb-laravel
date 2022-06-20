<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parser\ParseNewsRequest;
use App\Jobs\NewsParser;
use App\Queries\QueryBuilderSources;
use App\Services\ParserService;

class ParserController extends Controller
{
    public function parseNews(ParseNewsRequest $request, QueryBuilderSources $sources)
    {
        $sources = $sources->listSourcesById($request->validated()['ids'], ['id', 'url']);
        foreach ($sources as $source) {
            NewsParser::dispatch($source);
        }
        return redirect()->route('admin.news.index')
            ->with('success', __('message.admin.parser.started'));
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
}
