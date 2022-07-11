<?php

namespace App\Http\Controllers\Admin\Client\Import;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class LoadingController extends Controller {
    public function __invoke() {
        return view('admin.clients.import.loading');
    }
}
