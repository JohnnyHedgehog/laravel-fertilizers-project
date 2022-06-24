<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest {
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
            'email' => 'required | string | email | unique:users,email,' . $this->user_id,
            'role' => 'required | string',
            'user_id' => 'required | integer | exists:users,id'
        ];
    }

    // сообщения об ошибках
    public function messages() {
        return [
            'name.required' => 'Это поле обязательно для заполнения',
            'name.string' =>  'В данное поле нужно ввести данные строкового типа',
            'email.required' => 'Это поле обязательно для заполнения',
            'email.string' =>  'В данное поле нужно ввести данные строкового типа',
            'email.email' =>  'Данные должны соответствовать формату электронной почты mail@some.domain',
            'email.unique' =>  'Пользователь с таким email уже существует',
        ];
    }
}
