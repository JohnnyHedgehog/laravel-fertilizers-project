<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function __invoke() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
