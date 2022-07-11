<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FertilizersExport implements FromView, ShouldAutoSize, WithStyles, WithColumnFormatting {

    public $fertilizers;

    /**
     * IndexExport constructor.
     * @param $indexes
     */
    public function __construct($fertilizers) {
        $this->fertilizers = $fertilizers;
    }

    public function view(): View {
        return view('excel.export.fertilizers', [
            'fertilizers' => $this->fertilizers
        ]);
    }

    public function styles(Worksheet $sheet) {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function columnFormats(): array {
        return [
            'C' => NumberFormat::FORMAT_NUMBER_00,
            'D' => NumberFormat::FORMAT_NUMBER_00,
            'E' => NumberFormat::FORMAT_NUMBER_00,
            'H' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
