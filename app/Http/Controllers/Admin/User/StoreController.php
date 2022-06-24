<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller {
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        // хэшируем пароль пользователя
        $data['password'] = Hash::make($data['password']);

        // проверяем уникальность email и создаем нового пользователя
        User::firstOrCreate(['email' => $data['email']], $data);
        return redirect()->route('admin.user.index');
    }
}
