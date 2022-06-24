<?php

namespace App\Http\Controllers\Admin\User\Trash;

use App\Http\Controllers\Controller;

use App\Models\User;


class IndexController extends Controller {
    public function __invoke() {
        $users = User::onlyTrashed()->get();
        return view('admin.users.trash.index', compact('users'));
    }
}
