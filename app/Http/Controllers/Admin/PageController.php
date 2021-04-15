<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\PageService;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages= Page::paginate();

        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view("admin.page.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:pages,title|max:50',
            'body' => 'required',
        ]);
        $validated['slug'] = Str::slug($validated['title']);
        $page = Page::create($validated);

        return redirect()->route('admin.page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Page $page, PageService $service)
    {
        $page->body = $service->wrapWith($page->body, "container");
        return view('admin.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Page $page
     * @return Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  Page $page
     * @return Response
     */
    public function update(Request $request, Page $page)
    {
        $validationTitle = 'required|max:50';
        if ($page->title != $request->title) {
            $validationTitle .= '|unique:pages,title';
        }
        $request['active'] = $request->has('active');
        $validated = $request->validate([
            'title' => $validationTitle,
            'body' => 'required',
            'active' => 'required',
        ]);


        $validated['slug'] = Str::slug($validated['title']);
        $page->update($validated);

        return redirect()->route('admin.page.show', $page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Page $page
     * @return Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
