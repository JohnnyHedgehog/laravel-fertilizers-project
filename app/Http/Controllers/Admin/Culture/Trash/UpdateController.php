<?php

namespace App\Http\Controllers\Admin\Culture\Trash;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\UpdateRequest;
use App\Models\Culture;


class UpdateController extends Controller {
    public function __invoke($culture) {
        Culture::onlyTrashed()->where('id', $culture)->restore();
        return redirect()->route('admin.culture.trash.index');
    }
}
