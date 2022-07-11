<?php

namespace App\Http\Controllers\Admin\Client\Import;

use App\Http\Controllers\Controller;

class CreateController extends Controller {
    public function __invoke() {
        return view('admin.clients.import.create');
    }
}
