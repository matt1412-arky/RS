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
        Schema::create('t_doctor_office_treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctor_treatment_id')->nullable();
            $table->bigInteger('doctor_office_id')->nullable();

            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

            $table->index('doctor_treatment_id');
            $table->foreign('doctor_treatment_id')->references('id')->on('t_doctor_treatments')->onDelete('cascade');
            $table->index('doctor_office_id');
            $table->foreign('doctor_office_id')->references('id')->on('t_doctor_offices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_doctor_office_treatments');
    }
};
