<?php

namespace App\Http\Controllers\Admin\Fertilizer\Import;

use App\Http\Controllers\Controller;

class CreateController extends Controller {
    public function __invoke() {
        return view('admin.fertilizers.import.create');
    }
}
