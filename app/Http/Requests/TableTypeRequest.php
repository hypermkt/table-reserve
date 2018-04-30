<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // TODO: この設定の意味が分からないので後で調べる
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'release_state' => 'required',
            'title' => 'required:max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'minimum_capacity' => 'required|numeric',
            'max_capacity' => 'required|numeric',
            'number_of_sales' => 'required|numeric',
            'connectable' => 'required|boolean',
        ];
    }
}
