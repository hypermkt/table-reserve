<?php

namespace App\Services\Stock;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DataAccess\Eloquent\Stock;
use Illuminate\Support\Facades\Auth;

class CreateService
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        Stock::where('accept_date', '>=', Carbon::parse($this->request->baseDate)->format('Y-m-01'))
            ->where('accept_date', '<', Carbon::parse($this->request->baseDate)->addMonth(1)->format('Y-m-01'))->delete();

        if (is_array($this->request->accept_dates) && is_array($this->request->acceptable_table_numbers)) {
            foreach ($this->request->accept_dates as $key => $accept_date) {
                $acceptable_table_number = $this->request->acceptable_table_numbers[$key] ?? null;
                if (isset($accept_date) && isset($acceptable_table_number)) {
                    $arr = explode(':', $key);
                    Stock::updateOrCreate(
                        ['user_id' => Auth::id(), 'table_type_id' => $arr[1], 'accept_date' => $accept_date],
                        ['user_id' => Auth::id(), 'table_type_id' => $arr[1], 'accept_date' => $accept_date, 'acceptable_table_number' => $acceptable_table_number]
                    );
                }
            }
        }
    }
}