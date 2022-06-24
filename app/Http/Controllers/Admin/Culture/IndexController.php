<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;


class IndexController extends Controller {
    public function __invoke() {
        $cultures = Culture::all();
        return view('admin.cultures.index', compact('cultures'));
    }
}
