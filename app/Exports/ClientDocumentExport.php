<?php
// ГЕНЕРИРУЕМ СПРАВКУ ПО КЛИЕНТУ ДЛЯ ВЫГРУЗКИ ИЗ АДМИНКИ

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;


class ClientDocumentExport {

    public $client;

    public function __construct($client) {
        $this->client = $client;
    }

    public function getClientWordDocument() {
        $phpWord = new PhpWord();
        $today = Carbon::today()->locale('ru_RU');

        $section = $phpWord->addSection();

        $section->addText('Справка', [
            'size' => 18, 'color' => '#000', 'bold' => true
        ], [
            'align' => Alignment::HORIZONTAL_CENTER
        ]);
        $section->addText('');

        $section->addText('Подтверждает действительность заключение договора от ' .  $this->client->dateOfSigned()->translatedFormat('d.m.Y') .  ' с компанией «' .  $this->client->name .  '» на сумму ' .  $this->client->purchaseFormatted() . ' руб.', [
            'size' => 13, 'color' => '#545454', 'italic' => true
        ]);

        $section->addText('');

        $section->addText($today->translatedFormat('d F Y'), [
            'size' => 11
        ]);

        $section->addText('С уважением,', [
            'size' => 11
        ]);
        $section->addText('ИП Иванов. А. С.', [
            'size' => 11
        ]);
        $path = 'app/word/export/Справка от ' . $today->translatedFormat('d.m.Y') . '.docx';

        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');

        $objWriter->save(storage_path($path));
        return $path;
    }
}
