<?php

namespace App\Services\Stock;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DataAccess\Eloquent\Stock;
use App\DataAccess\Eloquent\TableType;

class ListService
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $baseDate = $this->request->month ?? Carbon::now()->format('Y-m');

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

        return [
            'tableTypes' => TableType::all(),
            'baseDate' => $baseDate,
            'stocksTable' => $stocksTable,
            'nextMonth' => Carbon::parse($baseDate)->addMonth(1)->format('Y-m'),
            'prevMonth' => Carbon::parse($baseDate)->addMonth(-1)->format('Y-m'),
        ];
    }
}