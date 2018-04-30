<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableType;

class TableTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_types.index', ['tableTypes' => TableType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'release_state' => 'required',
            'title' => 'required:max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'minimum_capacity' => 'required|numeric',
            'max_capacity' => 'required|numeric',
            'number_of_sales' => 'required|numeric',
            'connectable' => 'required|boolean',
        ]);

        TableType::create([
            'release_state' => $request->release_state,
            'title' => $request->title,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'minimum_capacity' => $request->minimum_capacity,
            'max_capacity' => $request->max_capacity,
            'number_of_sales' => $request->number_of_sales,
            'connectable' => $request->connectable,
        ]);

        return redirect()->to('/table_types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('table_types.show', ['tableType' => TableType::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('table_types.edit', ['tableType' => TableType::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        return redirect()->to('/table_types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TableType $tableType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableType $tableType)
    {
        $tableType->delete();

        return redirect()->to('/table_types');
    }
}
