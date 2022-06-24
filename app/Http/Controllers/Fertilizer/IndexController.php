<?php

namespace App\Http\Controllers\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Fertilizer\FilterRequest;
use App\Models\Culture;
use App\Models\Fertilizer;



class IndexController extends Controller {
    public function __invoke(FilterRequest $request) {
        $data = $request->validated();

        $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter($data)]);

        $fertilizers = Fertilizer::filter($filter)->get();

        $cultures = Culture::all();

        // получаем все регионы из таблицы
        $regions = Fertilizer::select('region')->distinct()->get();


        return view('fertilizers.index', compact('fertilizers', 'data', 'regions', 'cultures'));
    }
}
