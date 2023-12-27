<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_doctor_educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctor_id')->nullable();
            $table->bigInteger('education_level_id')->nullable();
            $table->string('institution_name', 100)->nullable();
            $table->string('major', 100)->nullable();
            $table->string('start_year', 4)->nullable();
            $table->string('end_year', 4)->nullable();
            $table->boolean('is_last_education')->defalut(false)->nullable();
            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

            $table->index('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('m_doctors')->onDelete('cascade');
            $table->index('education_level_id');
            $table->foreign('education_level_id')->references('id')->on('m_education_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_doctor_educations');
    }
};
