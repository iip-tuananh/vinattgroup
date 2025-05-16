<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->text('production_process_description')->nullable();
            $table->text('production_process_content')->nullable();
            $table->text('quality_control_description')->nullable();
            $table->text('quality_control_content')->nullable();
            $table->text('certificate_description')->nullable();
            $table->text('certificate_content')->nullable();
            $table->text('catalog_description')->nullable();
            $table->text('catalog_content')->nullable();
            $table->text('catalog_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
