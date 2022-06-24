<?php

namespace App\Http\Controllers\Admin\Culture\Trash;

use App\Http\Controllers\Controller;
use App\Models\Culture;


class IndexController extends Controller {
    public function __invoke() {
        $cultures = Culture::onlyTrashed()->get();
        return view('admin.cultures.trash.index', compact('cultures'));
    }
}
