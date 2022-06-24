<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('nitrogen_rate', 9, 2);
            $table->float('phosphorus_rate', 9, 2);
            $table->float('potassium_rate', 9, 2);
            $table->unsignedBigInteger('culture_id');
            $table->string('region');
            $table->float('price', 9, 2);
            $table->text('description');
            $table->string('purpose');
            $table->timestamps();
            $table->softDeletes();

            $table->index('culture_id', 'fertilize_culture_idx');
            $table->foreign('culture_id', 'fertilize_culture_fk')->on('cultures')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('fertilizers');
    }
}
