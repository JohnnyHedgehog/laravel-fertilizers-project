<?php

namespace App\Console\Commands;

use App\Imports\FertilizersImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportFertilizersFromExcelCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:fertilizers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт удобрений из файла Excel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $filePath = public_path() . '/excel/import/Импорт_удобрений.xlsx';
        Excel::import(new FertilizersImport(), $filePath);
    }
}
