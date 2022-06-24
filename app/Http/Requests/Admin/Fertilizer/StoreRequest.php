<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required | string ',
            'nitrogen_rate' => 'required | numeric',
            'phosphorus_rate' => 'required | numeric',
            'potassium_rate' => 'required | numeric',
            'culture_id' => 'required | integer',
            'region' => 'required | string',
            'price' => 'required | numeric',
            'description' => 'required | string',
            'purpose' => 'required | string'
        ];
    }
}
