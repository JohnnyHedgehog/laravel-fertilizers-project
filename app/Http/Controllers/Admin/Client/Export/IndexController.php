<?php

namespace App\Http\Controllers\Admin\Client\Export;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientsExport;

class IndexController extends Controller {
    public function __invoke() {
        $clients = Client::all();
        return Excel::download(new ClientsExport($clients), 'Клиенты.xlsx');
    }
}
