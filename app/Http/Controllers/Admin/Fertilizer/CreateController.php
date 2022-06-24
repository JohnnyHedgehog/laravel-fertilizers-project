<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class CreateController extends Controller {
    public function __invoke() {
        $cultures = Culture::all();
        return view('admin.fertilizers.create', compact('cultures'));
    }
}
