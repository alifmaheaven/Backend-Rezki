<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('amount');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_campaign')->references('id')->on('campaigns')->onDelete('cascade');
            $table->string('sukuk');
            $table->unsignedBigInteger('administration_fee');
            $table->string('updated_by')->default('system');
            $table->string('created_by')->default('system');
            $table->boolean('is_deleted')->default('0');
            $table->integer('version')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
