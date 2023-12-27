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
        Schema::create('m_medical_facilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
            $table->bigInteger('medical_facility_category_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->text('full_address')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone_code', 10)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('fax', 15)->nullable();

            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

            $table->index('location_id');
            $table->foreign('location_id')->references('id')->on('m_locations')->onDelete('cascade');

            $table->index('medical_facility_category_id');
            $table->foreign('medical_facility_category_id')->references('id')->on('m_medical_facility_categories')->onDelete('cascade');

            $table->index('created_by');
            $table->foreign('created_by')->references('id')->on('m_users')->onDelete('cascade');
            $table->index('modified_by');
            $table->foreign('modified_by')->references('id')->on('m_users')->onDelete('cascade');
            $table->index('deleted_by');
            $table->foreign('deleted_by')->references('id')->on('m_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_medical_facilities');
    }
};
