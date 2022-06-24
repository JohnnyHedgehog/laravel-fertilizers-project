<?php

namespace App\Http\Controllers\Admin\Fertilizer\Trash;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;


class UpdateController extends Controller {
    public function __invoke($fertilizer) {
        Fertilizer::onlyTrashed()->where('id', $fertilizer)->restore();
        return redirect()->route('admin.fertilizer.trash.index');
    }
}
