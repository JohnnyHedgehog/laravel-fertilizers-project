<?php

namespace App\Http\Controllers\Admin\Client\WordExport;

use App\Exports\ClientDocumentExport;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientsExport;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller {
    public function __invoke(Client $client) {
        $document = new ClientDocumentExport($client);
        $path = $document->getClientWordDocument();

        return response()->download(storage_path($path));
    }
}
