<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\ExcelImport;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ClientsImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows {
    private $import;
    private $errors;
    /**
     * @param Collection $collection
     */
    public function __construct($import) {
        $this->import = $import;
    }

    public function collection(Collection $collection) {
        DB::beginTransaction();
        foreach ($collection as $row) {
            if ($row->filter()->isNotEmpty()) {

                Client::firstOrCreate([
                    'name' => $row['naimenovanie'],
                ], [
                    'name' => $row['naimenovanie'],
                    'date_of_signed' => Date::excelToDateTimeObject($row['data_dogovora']),
                    'purchase' => $row['stoimost_postavki'],
                    'region' => $row['region'],
                ]);
            }
        }
        DB::commit();
        // Если есть ошибки - записываем в статус импорта
        if (!empty($this->errors)) {
            DB::rollBack();
            $this->import->update([
                "errors" => json_encode($this->errors, JSON_UNESCAPED_UNICODE)
            ]);
        }
        // меняем статус импорта по завершении
        $this->import->update([
            'status_id' => (empty($this->errors)) ? 3 : 2
        ]);
    }

    public function rules(): array {
        // такой же синтаксис валидации, как и для request валидации
        return [
            'naimenovanie' => 'required|string',
            'data_dogovora' => 'required| numeric',
            'stoimost_postavki' => 'required|numeric',
            'region' => 'required|string',
        ];
    }

    public function customValidationMessages() {
        // пример сообщений об ошибках
        return [
            'naimenovanie.required' => 'Отсутствует поле "Название клиента"',
            'naimenovanie.string' => 'Название клиента должно быть в строчном формате',
            'data_dogovora.required' => 'Отсутствует поле "Дата договора"',
            'data_dogovora.numeric' => 'Дата договора должна быть записана в Excel в формате Даты дд.мм.гггг',
            'stoimost_postavki.required' => 'Отсутствует поле "Стоимость поставки"',
            'stoimost_postavki.numeric' => 'Стоимость поставки должна быть в числовом формате',
            'region.required' => 'Отсутствует поле "Регион"',
            'region.string' => 'Регион должен быть в строчном формате',
        ];
    }

    public function onFailure(Failure ...$failures) {

        foreach ($failures as $failure) {
            $this->errors[] = [
                "row" => $failure->row(),
                "error" => $failure->errors()[0]
            ];
        }
    }
}
