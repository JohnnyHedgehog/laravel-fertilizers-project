<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\StoreRequest;
use App\Models\Client;

class StoreController extends Controller {
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        Client::create($data);
        return redirect()->route('admin.client.index');
    }
}
