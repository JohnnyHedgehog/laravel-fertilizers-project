<?php

namespace App\Http\Controllers\Admin\Fertilizer\Export;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FertilizersExport;
use App\Models\Fertilizer;

class IndexController extends Controller {
    public function __invoke() {
        $fertilizers = Fertilizer::all();
        return Excel::download(new FertilizersExport($fertilizers), 'Удобрения.xlsx');
    }
}
