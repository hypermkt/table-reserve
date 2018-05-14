<?php

namespace App\Http\Controllers\Api\V1\Reservation\Schedule;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\DataAccess\Eloquent\Stock;

class MonthController extends Controller
{
    /**
     * 指定月の予約不可日付一覧を返す
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $date = new Carbon($request->date);
        $startDate = clone $date;
        $endDate = clone $date;
        $targetDate = clone $date;

        $stocks = Stock::where('user_id', Auth::id())
            ->where('table_type_id', $request->table_type_id)
            ->where('accept_date', '>=', $startDate->day(1)->toRfc3339String())
            ->where('accept_date', '<', $endDate->addMonth(1)->day(1)->toRfc3339String())
            ->where('acceptable_table_number', '>', 0) // 1件以上ありで在庫ありと判別
            ->get();
        $acceptDates = array_pluck($stocks, 'accept_date');

        $disabledDates = [];
        for ($i = 1; $i <= $targetDate->daysInMonth; $i++) {
            if (!in_array($targetDate->format('Y-m-d'), $acceptDates)) {
                array_push($disabledDates, $targetDate->format('Y-m-d'));
            }
            $targetDate->addDay(1);
        }

        return response()->json([
            'disable_dates' => $disabledDates
        ]);
    }
}
