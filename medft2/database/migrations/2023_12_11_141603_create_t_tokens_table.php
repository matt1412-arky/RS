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
        Schema::create('t_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 100)->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('token', 50)->nullable();
            $table->dateTime('expired_on')->nullable();
            $table->boolean('is_expired')->nullable();
            $table->string('used_for', 20)->nullable();
            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_deleted')->default(false);

            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('m_users')->onDelete('cascade');

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
        Schema::dropIfExists('t_tokens');
    }
};
