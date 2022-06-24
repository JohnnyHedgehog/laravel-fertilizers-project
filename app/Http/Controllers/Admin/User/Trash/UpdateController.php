<?php

namespace App\Http\Controllers\Admin\User\Trash;

use App\Http\Controllers\Controller;

use App\Models\User;


class UpdateController extends Controller {
    public function __invoke($user) {
        User::onlyTrashed()->where('id', $user)->restore();
        return redirect()->route('admin.user.trash.index');
    }
}
