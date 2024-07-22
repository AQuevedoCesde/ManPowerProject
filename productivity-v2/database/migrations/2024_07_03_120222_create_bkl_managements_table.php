<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBklManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkl_managements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('bkl_area_id');
            $table->foreign('bkl_area_id')->references('id')->on('bkl_areas');
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
        Schema::dropIfExists('bkl_managements');
    }
}
