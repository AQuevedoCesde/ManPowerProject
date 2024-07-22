<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBklProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bkl_projects', function (Blueprint $table) {
            $table->id();
            $table->string('css');
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('bkl_management_id');
            $table->foreign('bkl_management_id')->references('id')->on('bkl_managements');
            $table->unsignedBigInteger('bkl_state_id');
            $table->foreign('bkl_state_id')->references('id')->on('bkl_states');
            $table->integer('taking_action');
            $table->string('situation');
            $table->date('deadline')->nullable()->default(null);
            $table->unsignedBigInteger('bkl_role_id');
            $table->foreign('bkl_role_id')->references('id')->on('bkl_roles');
            $table->unsignedBigInteger('bkl_type_id');
            $table->foreign('bkl_type_id')->references('id')->on('bkl_types');
            $table->string('client');
            $table->unsignedBigInteger('bkl_priority_id');
            $table->foreign('bkl_priority_id')->references('id')->on('bkl_priorities');
            $table->timestamps();
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bkl_projects');
    }
}
