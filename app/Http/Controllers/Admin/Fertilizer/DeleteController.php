<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;


class DeleteController extends Controller {
    public function __invoke(Fertilizer $fertilizer) {
        $fertilizer->delete();
        return redirect()->route('admin.fertilizer.index');
    }
}
