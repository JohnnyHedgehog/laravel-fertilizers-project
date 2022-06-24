<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\Admin\ClientFilter;
use App\Http\Requests\Admin\Client\FilterRequest;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function __invoke(FilterRequest $request) {
        $data = $request->validated();

        $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);

        $clients = Client::filter($filter)->get();

        // получаем все регионы из таблицы
        $regions = Client::select('region')->distinct()->get();

        return view('admin.clients.index', compact('clients', 'regions', 'data'));
    }
}
