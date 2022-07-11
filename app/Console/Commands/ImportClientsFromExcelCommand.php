<?php

namespace App\Console\Commands;

use App\Imports\ClientsImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportClientsFromExcelCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:import:clients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт клиентов из файла Excel';

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
        $filePath = public_path() . '/excel/import/Импорт_клиентов.xlsx';
        Excel::import(new ClientsImport(), $filePath);
    }
}
