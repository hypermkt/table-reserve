<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableTypeRequest;
use Illuminate\Http\Request;
use App\DataAccess\Eloquent\TableType;
use Auth;

class TableTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table_types.index', [
            'tableTypes' => TableType::all()
        ]);
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
     * @param  TableTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableTypeRequest $request)
    {
        TableType::create([
            'restaurant_id' => session('restaurant_id'),
            'user_id' => Auth::id(),
            'release_state' => $request->release_state,
            'table_type_name' => $request->table_type_name,
            'available_start_time' => $request->available_start_time,
            'available_end_time' => $request->available_end_time,
            'minimum_capacity' => $request->minimum_capacity,
            'max_capacity' => $request->max_capacity,
            'number_of_sales' => $request->number_of_sales,
            'connectable' => $request->connectable,
        ]);

        return redirect()->to('/table_types')->with('success', '席タイプ「' . $request->table_type_name . '」を登録しました' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('table_types.show', [
            'tableType' => TableType::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('table_types.edit', [
            'tableType' => TableType::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TableTypeRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableTypeRequest $request, $id)
    {
        $tableType = TableType::find($id);
        $tableType->release_state = $request->release_state;
        $tableType->table_type_name = $request->table_type_name;
        $tableType->available_start_time = $request->available_start_time;
        $tableType->available_end_time = $request->available_end_time;
        $tableType->minimum_capacity = $request->minimum_capacity;
        $tableType->max_capacity = $request->max_capacity;
        $tableType->number_of_sales = $request->number_of_sales;
        $tableType->connectable = $request->connectable;
        $tableType->save();

        return redirect()->to('/table_types')->with('success', '席タイプ「' . $request->table_type_name . '」を更新しました' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataAccess\Eloquent\TableType $tableType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableType $tableType)
    {
        $tableName = $tableType->table_type_name;
        $tableType->delete();

        return redirect()->to('/table_types')->with('success', '席タイプ「' . $tableName. '」を削除しました' );
    }
}
