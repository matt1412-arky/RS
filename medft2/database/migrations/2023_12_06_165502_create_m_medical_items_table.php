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
        Schema::create('m_medical_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50)->nullable();
            $table->bigInteger('medical_item_category_id')->nullable();
            $table->string('composition')->nullable();
            $table->bigInteger('medical_item_segmentation_id')->nullable();
            $table->string('manufacturer', 100)->nullable();
            $table->string('indication')->nullable();
            $table->string('dosage')->nullable();
            $table->string('directions')->nullable();
            $table->string('contradiction')->nullable();
            $table->string('caution')->nullable();
            $table->string('packaging', 50)->nullable();
            $table->bigInteger('price_max')->nullable();
            $table->bigInteger('price_min')->nullable();
            $table->binary('image')->nullable();
            $table->string('image_path', 100)->nullable();

            $table->index('medical_item_category_id');
            $table->foreign('medical_item_category_id')->references('id')->on('m_medical_item_categories')->onDelete('cascade');
            $table->index('medical_item_segmentation_id');
            $table->foreign('medical_item_segmentation_id')->references('id')->on('m_medical_item_segmentations')->onDelete('cascade');

            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

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
        Schema::dropIfExists('m_medical_items');
    }
};
