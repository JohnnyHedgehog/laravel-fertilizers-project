<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Fertilizer;
use Carbon\Carbon;


class IndexController extends Controller {
    public function __invoke() {
        $fertilizers = Fertilizer::all();
        return view('admin.fertilizers.index', compact('fertilizers'));
    }
}
