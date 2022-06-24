<?php

namespace App\Http\Controllers\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;
use Illuminate\Http\Request;

class ShowController extends Controller {
    public function __invoke(Fertilizer $fertilizer) {
        return view('fertilizers.show', compact('fertilizer'));
    }
}
