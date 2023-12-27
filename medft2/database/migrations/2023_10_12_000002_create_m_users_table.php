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
        Schema::create('m_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('biodata_id')->nullable();
            $table->bigInteger('role_id')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('password', 255)->nullable();
            $table->integer('login_attempt')->nullable();
            $table->boolean('is_locked')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_deleted')->default(false);

            $table->index('role_id');
            $table->foreign('role_id')->references('id')->on('m_roles')->onDelete('cascade');

            $table->index('biodata_id');
            $table->foreign('biodata_id')->references('id')->on('m_biodatas')->onDelete('cascade');

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
        Schema::dropIfExists('m_users');
    }
};
