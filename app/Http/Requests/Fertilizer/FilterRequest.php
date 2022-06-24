<?php

namespace App\Http\Requests\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FilterRequest extends FormRequest {
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
            'name' => 'string | nullable',
            'nitrogen_more' => 'numeric | nullable',
            'nitrogen_less' => 'numeric | nullable',
            'phosphorus_more' => 'numeric | nullable',
            'phosphorus_less' => 'numeric | nullable',
            'potassium_more' => 'numeric | nullable',
            'potassium_less' => 'numeric | nullable',
            'culture_id' => 'array | nullable',
            'culture_id.*' => 'string | nullable |exists:cultures,id',
            'region' => 'array | nullable',
            'region.*' => 'string | nullable |exists:fertilizers,region',
            'price_more' => 'numeric | nullable',
            'price_less' => 'numeric | nullable',
            'description' => 'string | nullable',
            'purpose' => 'string | nullable',

            'name_sort' => ['string', Rule::in(['asc', 'desc'])],
            'price_sort' => ['string', Rule::in(['asc', 'desc'])],
        ];
    }
}
