<?php

namespace App\Http\Controllers\Admin\Fertilizer\Import;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class LoadingController extends Controller {
    public function __invoke() {
        return view('admin.fertilizers.import.loading');
    }
}
