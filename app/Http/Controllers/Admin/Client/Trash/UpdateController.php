<?php

namespace App\Http\Controllers\Admin\Client\Trash;

use App\Http\Controllers\Controller;

use App\Models\Client;


class UpdateController extends Controller {
    public function __invoke($id) {
        Client::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('admin.client.trash.index');
    }
}
