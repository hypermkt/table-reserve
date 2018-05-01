<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\TableType;
use App\Stock;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $baseDate = $request->month ?? Carbon::now()->format('Y-m');

        $acceptableTableNumbers = Stock::where('accept_date', '>=', Carbon::parse($baseDate)->format('Y-m-01'))
            ->where('accept_date', '<', Carbon::parse($baseDate)->addMonth(1)->format('Y-m-01'))
            ->get()
            ->pluck('acceptable_table_number', 'accept_date')
            ->toArray();

        $stocksTable = [];
        for ($i = 0; $i < Carbon::parse($baseDate)->daysInMonth; $i++) {
            $date = $baseDate . '-' . sprintf('%02d', ($i + 1));
            $stocksTable[$i]['formatted_date'] = Carbon::parse($date)->format('Y-m-d(D)');
            $stocksTable[$i]['accept_date_value'] = Carbon::parse($date)->format('Y-m-d');
            $stocksTable[$i]['acceptable_table_number'] = $acceptableTableNumbers[$date] ?? null;
        }

        return view('stocks.index', [
            'tableTypes' => TableType::all(),
            'baseDate' => $baseDate,
            'stocksTable' => $stocksTable,
            'nextMonth' => Carbon::parse($baseDate)->addMonth(1)->format('Y-m'),
            'prevMonth' => Carbon::parse($baseDate)->addMonth(-1)->format('Y-m'),
        ]);
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
                        ['table_type_id' => $arr[1], 'accept_date' => $accept_date],
                        ['table_type_id' => $arr[1], 'accept_date' => $accept_date, 'acceptable_table_number' => $acceptable_table_number]
                    );
                }
            }
        }

        return redirect()->to('/stocks');
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
