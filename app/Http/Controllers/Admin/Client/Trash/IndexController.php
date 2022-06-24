<?php

namespace App\Http\Controllers\Admin\Client\Trash;

use App\Http\Controllers\Controller;
use App\Models\Client;


class IndexController extends Controller {
    public function __invoke() {
        $clients = Client::onlyTrashed()->get();
        return view('admin.clients.trash.index', compact('clients'));
    }
}
