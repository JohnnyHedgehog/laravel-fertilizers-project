<?php

namespace App\Http\Requests\Admin\Client;

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
            'date_of_signed_more' => 'date | nullable',
            'date_of_signed_less' => 'date | nullable',
            'purchase_more' => 'numeric | nullable',
            'purchase_less' => 'numeric | nullable',
            'region' => 'array | nullable',
            'region.*' => 'string | nullable |exists:clients,region',

            'name_sort' => ['string', Rule::in(['asc', 'desc'])],
            'purchase_sort' => ['string', Rule::in(['asc', 'desc'])],
        ];
    }
}
