<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Page;
use App\Http\Requests;

class PagesController extends Controller
{

    /**
     * @var Page
     */
    private $page;

    public function __construct(Page $page)
    {
        $this->middleware('auth', ['except' => ['show', 'showBySlug']]);
        $this->page = $page;
    }

    /**
     * Show all of the existing resources.
     *
     */
    public function index()
    {
        $pages = $this->page->all();

        return view('pages.index')->with(['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $pages = $this->page->all();

        return view('pages.create')->with(['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'page_type' => 'required',
            'state' => 'required'
        ]);

        $data = $request->all();
        $data['publish_at'] = date('Y-m-d H:i:s', strtotime($data['publish_at']));
        unset($data['_token']);
        $page = $this->page->create($data);

        return redirect()->route('pages.show', $page->id);

    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $page = $this->page->find($id);

        if (isset($page->slug)) return redirect(route('slugRoute', $page->slug));

        return $this->showPage($page);
    }

    /**
     * Display the specified resource.
     *
     */
    public function showBySlug($slug)
    {
        $page = $this->page->where('slug', '=', $slug)->first();

        return $this->showPage($page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($id)
    {
        $page = $this->page->find($id);

        $pages = $this->page->all();

        return view('pages.edit')->with(['page' => $page, 'pages' => $pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request, $id)
    {
        $this->updatePage($request, $id);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function apiUpdate(Request $request, $id)
    {
        $page = $this->updatePage($request, $id);

        return response()->json($page);
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy($id)
    {
        $page = $this->page->find($id);
        $page->delete();

        return redirect(route('pages.index'));
    }

    /**
     * @param $page
     * @return $this|void
     */
    public function showPage($page)
    {
        if (!Auth::check() && $page->state != 'published') return abort(404, 'Page not found');

        if (isset($page->page_type) && $page->page_type == 'page') return view('pages.show')->with(['page' => $page]);

        return view('pages.show-' . $page->page_type)->with(['page' => $page]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    private function updatePage(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'page_type' => 'required',
            'state' => 'required'
        ]);

        $page = $this->page->find($id);
        $page->update($request->all());
        return $page;
    }
}
