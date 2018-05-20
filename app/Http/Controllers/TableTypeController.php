<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableTypeRequest;
use App\DataAccess\Eloquent\TableType;
use Auth;
use App\Repositories\TableTypeInterface;

class TableTypeController extends Controller
{
    private $tableTypeRepository;

    public function __construct(TableTypeInterface $tableTypeRepository)
    {
        $this->tableTypeRepository = $tableTypeRepository;
    }

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
        $this->tableTypeRepository->store($request->all(), session('restaurant_id'), Auth::id());

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
    public function update(TableTypeRequest $request, TableType $tableType)
    {
        $this->tableTypeRepository->update($request->all(), $tableType);

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
