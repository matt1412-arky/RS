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
        Schema::create('m_customer_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_biodata_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('customer_relation_id')->nullable();
            $table->bigInteger('created_by');
            $table->dateTime('created_on');
            $table->bigInteger('modified_by')->nullable();
            $table->dateTime('modified_on')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->dateTime('deleted_on')->nullable();
            $table->boolean('is_delete')->default(false);

            $table->index('parent_biodata_id');
            $table->foreign('parent_biodata_id')->references('id')->on('m_biodatas')->onDelete('cascade');
            $table->index('customer_id');
            $table->foreign('customer_id')->references('id')->on('m_customers')->onDelete('cascade');
            $table->index('customer_relation_id');
            $table->foreign('customer_relation_id')->references('id')->on('m_customer_relations')->onDelete('cascade');

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
        Schema::dropIfExists('m_customer_members');
    }
};
