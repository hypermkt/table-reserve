<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableTypeRequest;
use Illuminate\Http\Request;
use App\TableType;
use Auth;

class TableTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pageId)
    {
        return view('table_types.index', [
            'pageId' => $pageId,
            'tableTypes' => TableType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pageId)
    {
        return view('table_types.create', [
            'pageId' => $pageId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TableTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableTypeRequest $request, $pageId)
    {
        TableType::create([
            'page_id' => $pageId,
            'user_id' => Auth::id(),
            'release_state' => $request->release_state,
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'minimum_capacity' => $request->minimum_capacity,
            'max_capacity' => $request->max_capacity,
            'number_of_sales' => $request->number_of_sales,
            'connectable' => $request->connectable,
        ]);

        return redirect()->to('/pages/' . $pageId . '/table_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pageId, $id)
    {
        return view('table_types.show', [
            'tableType' => TableType::find($id),
            'pageId' => $pageId,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pageId, $id)
    {
        return view('table_types.edit', [
            'tableType' => TableType::find($id),
            'pageId' => $pageId,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TableTypeRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableTypeRequest $request, $pageId, $id)
    {
        $tableType = TableType::find($id);
        $tableType->title = $request->title;
        $tableType->start_time = $request->start_time;
        $tableType->end_time = $request->end_time;
        $tableType->minimum_capacity = $request->minimum_capacity;
        $tableType->max_capacity = $request->max_capacity;
        $tableType->number_of_sales = $request->number_of_sales;
        $tableType->connectable = $request->connectable;
        $tableType->save();

        return redirect()->to('/pages/' . $pageId . '/table_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TableType $tableType
     * @return \Illuminate\Http\Response
     */
    public function destroy($pageId, TableType $tableType)
    {
        $tableType->delete();

        return redirect()->to('/pages/' . $pageId . '/table_types');
    }
}
