<?php

namespace App\Jobs;

use App\Imports\ClientsImport;
use App\Imports\FertilizersImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class FertilizerExcelImportJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $filePath;
    private $import;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $import) {
        $this->filePath = $filePath;
        $this->import = $import;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        Excel::import(new FertilizersImport($this->import), $this->filePath, 'local');
    }
}
