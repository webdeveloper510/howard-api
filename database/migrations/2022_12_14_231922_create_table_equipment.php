<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('equipment_request_form', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('requestor_name');
            $table->string('last_name');
            $table->string('equipment_name');
            $table->string('equipment_last_name');
            $table->string('location');
            $table->string('requestor_email');
            $table->string('contact_phone');
            $table->integer('department_id');
            $table->string('requested_by_date');
            $table->string('type_hardware_requested');
            $table->string('software_requested');
            $table->text('additional_equipment');
            $table->string('reason');
            $table->text('ship_address');
            $table->string('ship_city');
            $table->string('ship_state');
            $table->string('ship_zipcode');
            $table->text('office_location');
            $table->string('additonal_users_fname');
            $table->string('additonal_users_lname');
            $table->string('signature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_request_form');
    }
}
