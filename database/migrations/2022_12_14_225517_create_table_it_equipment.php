<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_equipment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('manager_name');
            $table->string('last_name');
            $table->string('manager_email');
            $table->string('hired_name');
            $table->string('hired_last');
            $table->string('equipment_type');
            $table->string('hired_date');
            $table->string('employee_pos');
            $table->string('location');
            $table->string('copy_address');
            $table->string('department');
            $table->string('software_required');
            $table->string('disablity')->comment('1: Yes; 2:No ;');
            $table->string('add_soft');
            $table->string('door_badge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_equipment');
    }
}
