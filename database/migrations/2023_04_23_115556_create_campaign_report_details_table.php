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
        Schema::create('campaign_report_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_campaign_report')->references('id')->on('campaign_reports')->onDelete('cascade');
            $table->dateTime('date_time');
            $table->unsignedBigInteger('amount');
            $table->string('description');
            $table->string('evidence');
            $table->boolean('is_active')->default('1');
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
        Schema::dropIfExists('campaign_report_details');
    }
};
