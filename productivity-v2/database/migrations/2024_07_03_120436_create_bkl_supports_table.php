<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBklSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkl_supports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route');
            $table->string('extension');
            $table->unsignedBigInteger('advance_project_id');
            $table->foreign('advance_project_id')->references('id')->on('bkl_project_progresses');
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
        Schema::dropIfExists('bkl_supports');
    }
}
