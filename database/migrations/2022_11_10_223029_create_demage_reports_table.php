<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemageReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demage_reports', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('phone');
            $table->string('email');
            $table->string('location');
            $table->string('department');
            $table->string('title');
            $table->text('address');
            $table->date('date_of_incident');
            $table->time('time_of_incident');
            $table->date('reported_date');
            $table->time('reported_time');
            $table->string('police_report');
            $table->string('reporting_officer_name');
            $table->integer('station_phone');
            $table->integer('police_phone');
            $table->text('item_lost/stolen/damaged');
            $table->longText('last_known_location');
            $table->longText('description');
            $table->longText('resolution');
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
        Schema::dropIfExists('demage_reports');
    }
}
