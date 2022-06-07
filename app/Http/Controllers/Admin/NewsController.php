<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Queries\QueryBuilderAuthors;
use App\Queries\QueryBuilderNews;
use App\Queries\QueryBuilderCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'annotation' => ['required', 'string'],
            'authors' => ['required', 'array'],
            'categories' => ['required', 'array']
        ]);
        $validated = $request->except('_token', 'authors', 'categories');
        $news = new News($validated);
        if ($news->save() && $news->categories()->sync($request->categories) && $news->authors()->sync($request->authors)) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        };
        return back()->with('error', 'Ошибка добавления');
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
        //dd($news);
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
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->only(['title', 'annotation', 'content', 'status']);
        $news = $news->fill($validated);
        if ($news->save() && $news->categories()->sync($request->categories) && $news->authors()->sync($request->authors)) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        };
        return back()->with('error', 'Ошибка обновления');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
