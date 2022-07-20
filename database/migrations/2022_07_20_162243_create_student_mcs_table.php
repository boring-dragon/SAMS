<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_mcs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('module_id');
            $table->text('reason');
            $table->dateTime('class_date');
            $table->string('medical_file_url');
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
        Schema::dropIfExists('student_mcs');
    }
};
