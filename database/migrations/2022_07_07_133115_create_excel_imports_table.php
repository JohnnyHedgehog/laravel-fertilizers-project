<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelImportsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('excel_imports', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->jsonb('errors')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status_id', 'excel_import_status_idx');
            $table->foreign('status_id', 'excel_import_status_fk')->on('import_statuses')->references('id');

            $table->index('user_id', 'excel_import_user_idx');
            $table->foreign('user_id', 'excel_import_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('excel_imports');
    }
}
