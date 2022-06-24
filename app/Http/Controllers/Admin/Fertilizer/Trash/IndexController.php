<?php

namespace App\Http\Controllers\Admin\Fertilizer\Trash;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;



class IndexController extends Controller {
    public function __invoke() {
        $fertilizers = Fertilizer::onlyTrashed()->get();
        return view('admin.fertilizers.trash.index', compact('fertilizers'));
    }
}
