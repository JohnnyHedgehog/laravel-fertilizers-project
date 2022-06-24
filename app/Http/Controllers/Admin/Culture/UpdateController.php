<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\UpdateRequest;
use App\Models\Culture;


class UpdateController extends Controller {
    public function __invoke(UpdateRequest $request, Culture $culture) {
        $data = $request->validated();
        $culture->update($data);
        return redirect()->route('admin.culture.index');
    }
}
