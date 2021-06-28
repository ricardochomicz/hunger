<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'token_company' => [
                'required',
                'exists:companies,uuid'
            ],
            'table' => [
                'nullable',
                'exists:tables,uuid'
            ],
            'comment' => [
                'nullable',
                'max:1000'
            ]
        ];
    }
}