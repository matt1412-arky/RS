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
        Schema::create('m_wallet_default_nominals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nominal')->nullable();
            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_wallet_default_nominals');
    }
};