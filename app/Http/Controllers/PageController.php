<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use Illuminate\Http\Request;
use App\Page;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index', ['pages' => Page::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        Page::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'release_state' => $request->release_state,
        ]);

        return redirect()->to('/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.show', ['page' => Page::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.edit', ['page' => Page::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $page = Page::find($id);
        $page->title = $request->title;
        $page->description = $request->description;
        $page->release_state = $request->release_state;
        $page->save();

        return redirect()->to('/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return redirect()->to('/pages');
    }
}
