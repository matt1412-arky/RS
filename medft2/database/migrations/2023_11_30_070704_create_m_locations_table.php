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
        Schema::create('m_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->bigInteger('location_level_id')->nullable();
            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

            $table->index('location_level_id');
            $table->foreign('location_level_id')->references('id')->on('m_location_levels');

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
        Schema::dropIfExists('m_locations');
    }
};
