<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpFacilitiesRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_request', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('priority')->comment('1: Emergency; 2:High ; 3:Medium; 4:Low');
            $table->string('facility_location');
            $table->integer('general_location');
            $table->string('department_id');
            $table->string('facility_request');
            $table->text('emergency_impact');
            $table->text('description');
            $table->string('system');
            $table->string('file');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_request');
    }
}
