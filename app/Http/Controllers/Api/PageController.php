<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Services\PageService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{

    public function index(): Response
    {
        $pages = Page::all();

        return response($pages, 200);
    }

    public function show(Page $page, PageService $service): Response
    {
        if (Gate::allows('see-page', $page)) {
            $page->body = $service->wrapWith($page->body, "container pt-4");
            return response($page, 200);
        }
        // If not active or not admin then not found
        return response("You are not allowed to do this action", 403);
    }

}
