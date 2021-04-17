<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCompany extends FormRequest
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
        $id = $this->segment(3);

        $rules = [
            'name' => ['required', 'string', 'min:5', 'max:255', "unique:companies,name,{$id},id"],
            'email' => ['required', 'string', 'min:5', 'max:255', "unique:companies,email,{$id},id"],
            'cnpj' => ['required', 'digits:14'],
            'logo' => ['nullable', 'image'],
            'active' => ['required', 'in:Y,N'],

            'subscription' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date'],
            'subscription_id' => ['nullable', 'max:255'],
            'subscription_active' => ['nullable', 'boolean'],
            'subscription_suspended' => ['nullable', 'boolean'],
        ];

       return $rules;
    }
}
