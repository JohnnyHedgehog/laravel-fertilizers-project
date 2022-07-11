<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class FertilizersImport implements ToCollection, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows {
    private $import;
    private $errors;

    public function __construct($import) {
        $this->import = $import;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection) {
        DB::beginTransaction();
        foreach ($collection as $row) {
            if ($row->filter()->isNotEmpty()) {

                Fertilizer::firstOrCreate([
                    'name' => $row['naimenovanie'],
                ], [
                    'name' => $row['naimenovanie'],
                    'nitrogen_rate' => $row['norma_azot'],
                    'phosphorus_rate' => $row['norma_fosfor'],
                    'potassium_rate' => $row['norma_kalii'],
                    'culture_id' => $row['kultura_id'],
                    'region' => $row['raion'],
                    'price' => $row['stoimost'],
                    'description' => $row['opisanie'],
                    'purpose' => $row['naznacenie'],
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
            'norma_azot' => 'required|numeric',
            'norma_fosfor' => 'required|numeric',
            'norma_kalii' => 'required|numeric',
            'raion' => 'required|string',
            'stoimost' => 'required|numeric',
            'opisanie' => 'required|string',
            'naznacenie' => 'required|string',
            'kultura_id' => 'required|integer',

        ];
    }

    public function customValidationMessages() {
        // пример сообщений об ошибках
        return [
            'naimenovanie.required' => 'Отсутствует поле "Название клиента"',
            'naimenovanie.string' => 'Название клиента должно быть в строчном формате',
            'norma_azot.required' => 'Отсутствует поле "Норма Азот"',
            'norma_azot.numeric' => 'Поле "Норма Азот" должно быть в числовом формате',
            'norma_fosfor.required' => 'Отсутствует поле "Норма Фосфор"',
            'norma_fosfor.numeric' => 'Поле "Норма Фосфор" должно быть в числовом формате',
            'norma_kalii.required' => 'Отсутствует поле "Норма Калий"',
            'norma_kalii.numeric' => 'Поле "Норма Калий" должно быть в числовом формате',
            'raion.required' => 'Отсутствует поле "Регион"',
            'raion.required' => 'Отсутствует поле "Регион"',
            'raion.string' => 'Регион должен быть в строчном формате',
            'stoimost.required' => 'Отсутствует поле "Стоимость"',
            'stoimost.numeric' => 'Стоимость должна быть в числовом формате',
            'opisanie.required' => 'Отсутствует поле "Описание"',
            'opisanie.string' => 'Описание должно быть в строчном формате',
            'naznacenie.required' => 'Отсутствует поле "Назначение"',
            'naznacenie.string' => 'Назначение должно быть в строчном формате',
            'kultura_id.required' => 'Отсутствует поле "Культура ID"',
            'kultura_id.integer' => 'Поле "Культура ID" должно быть в числовом формате',
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
