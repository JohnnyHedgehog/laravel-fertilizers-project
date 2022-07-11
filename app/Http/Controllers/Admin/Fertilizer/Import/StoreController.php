<?php

namespace App\Http\Controllers\Admin\Fertilizer\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\Import\StoreRequest;
use App\Jobs\ClientExcelImportJob;
use App\Jobs\FertilizerExcelImportJob;
use App\Models\ExcelImport;

use Illuminate\Support\Facades\Storage;


class StoreController extends Controller {
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();

        // Сохраняем файл импорта в Storage
        $filePath = Storage::put('/excel/import/fertilizers', $data['import-file']);

        // Создаем запись статуса импорта в БД
        $importData = [
            'file_name' => $data['import-file']->getClientOriginalName(),
            'status_id' => 1,
            'user_id' => auth()->user()->id
        ];
        $import = ExcelImport::create($importData);

        // Делаем Job по импорту
        FertilizerExcelImportJob::dispatch($filePath, $import);

        return redirect()->route('admin.fertilizer.import.loading');
    }
}
