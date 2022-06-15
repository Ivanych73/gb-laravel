<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Source\StoreRequest;
use App\Http\Requests\Admin\Source\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Source;
use App\Queries\QueryBuilderSources;
use Illuminate\Support\Facades\Log;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(QueryBuilderSources $sourcesList)
    {
        return view(
            'admin.sources.index',
            [
                'sources' => $sourcesList->listItems()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $source = new Source($validated);
        if ($source->save()) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('message.admin.source.create.success'));
        }

        return back()->with('error', __('message.admin.source.create.fail'));
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
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', ['source' => $source]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Source $source)
    {
        $validated = $request->validated();
        $source = $source->fill($validated);
        if ($source->save()) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('message.admin.source.update.success'));
        }
        return back()->with('error', __('message.admin.source.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        try {
            $source->delete();
            return response()->json('success');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json('fail', 400);
        }
    }
}
