



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
        Schema::create('m_biodata_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('biodata_id')->nullable();
            $table->string('label', 100)->nullable();
            $table->string('recipient', 100)->nullable();
            $table->string('recipient_phone_number', 15)->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->string('portal_code', 10)->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

            $table->index('biodata_id');
            $table->foreign('biodata_id')->references('id')->on('m_biodatas');

            $table->index('location_id');
            $table->foreign('location_id')->references('id')->on('m_locations');

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
        Schema::dropIfExists('m_biodata_addresses');
    }
};
