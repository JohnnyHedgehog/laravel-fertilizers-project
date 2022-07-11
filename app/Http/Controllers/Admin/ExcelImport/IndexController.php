<?php

namespace App\Http\Controllers\Admin\ExcelImport;

use App\Http\Controllers\Controller;
use App\Models\ExcelImport;

class IndexController extends Controller {
    public function __invoke() {
        $imports = ExcelImport::orderBy('id', 'DESC')->paginate(10);
        foreach ($imports as $key => $import) {
            $imports[$key]['errors'] = json_decode($import['errors'], true);
        }


        return view('admin.excel-imports.index', compact('imports'));
    }
}
