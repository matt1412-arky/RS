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
        Schema::create('m_medical_facility_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('medical_facility_id')->nullable();
            $table->string('day', 10);
            $table->string('time_schedule_start', 10);
            $table->string('time_schedule_end', 10);

            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

            $table->index('medical_facility_id');
            $table->foreign('medical_facility_id')->references('id')->on('m_medical_facilities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_medical_facility_schedules');
    }
};
