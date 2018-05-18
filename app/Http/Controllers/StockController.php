<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DataAccess\Eloquent\Stock;
use Auth;
use App\Services\Stock\ListService;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListService $service)
    {
        return view('stocks.index', $service->execute());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stock::where('accept_date', '>=', Carbon::parse($request->baseDate)->format('Y-m-01'))
            ->where('accept_date', '<', Carbon::parse($request->baseDate)->addMonth(1)->format('Y-m-01'))->delete();

        if (is_array($request->accept_dates) && is_array($request->acceptable_table_numbers)) {
            foreach ($request->accept_dates as $key => $accept_date) {
                $acceptable_table_number = $request->acceptable_table_numbers[$key] ?? null;
                if (isset($accept_date) && isset($acceptable_table_number)) {
                    $arr = explode(':', $key);
                    Stock::updateOrCreate(
                        ['user_id' => Auth::id(), 'table_type_id' => $arr[1], 'accept_date' => $accept_date],
                        ['user_id' => Auth::id(), 'table_type_id' => $arr[1], 'accept_date' => $accept_date, 'acceptable_table_number' => $acceptable_table_number]
                    );
                }
            }
        }

        return redirect()->to('/stocks')->with('success', '在庫設定を登録しました');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
