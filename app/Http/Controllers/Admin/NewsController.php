<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreRequest;
use App\Http\Requests\Admin\News\UpdateRequest;
use App\Models\News;
use App\Queries\QueryBuilderAuthors;
use App\Queries\QueryBuilderNews;
use App\Queries\QueryBuilderCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryBuilderNews $newslist)
    {
        return view('admin.news.index', ['news' => $newslist->listNews()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(QueryBuilderCategories $categoriesList, QueryBuilderAuthors $authorsList)
    {
        return view('admin.news.create', [
            'categoriesList' => $categoriesList->listCategories(['id', 'title']),
            'authorsList' =>
            $authorsList->listAuthors(['id', 'first_name', 'last_name'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\News\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->safe()->except(['authors', 'categories']);
        $categories = $request->safe()->only(['categories']);
        $authors = $request->safe()->only(['authors']);
        $news = new News($validated);
        if (
            $news->save() &&
            $news->categories()->sync($categories['categories']) &&
            $news->authors()->sync($authors['authors'])
        ) {
            return redirect()->route('admin.news.index')
                ->with('success', __('message.admin.news.create.success'));
        };
        return back()->with('error', __('message.admin.news.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, QueryBuilderNews $newslist, QueryBuilderCategories $categoriesList, QueryBuilderAuthors $authorsList)
    {
        return view('admin.news.edit', [
            'news' => $newslist->showNewsDetailById($news->id),
            'categoriesList' => $categoriesList->listCategories(['id', 'title']),
            'authorsList' =>
            $authorsList->listAuthors(['id', 'first_name', 'last_name'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\News\UpdateRequest;  $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, News $news)
    {
        $validated = $request->safe()->only(['title', 'annotation', 'content', 'status']);
        $categories = $request->safe()->only(['categories']);
        $authors = $request->safe()->only(['authors']);
        $news = $news->fill($validated);
        if (
            $news->save() &&
            $news->categories()->sync($categories['categories']) &&
            $news->authors()->sync($authors['authors'])
        ) {
            return redirect()->route('admin.news.index')
                ->with('success', __('message.admin.news.update.success'));
        };
        return back()->with('error', __('message.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $news->delete();
            return response()->json('success');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json('fail', 400);
        }
    }
}
