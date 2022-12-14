<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmpCustody extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custody_employee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('employee_id');
            $table->string('employee_name');
            $table->string('last_name');
            $table->string('location');
            $table->enum('equipment_type', [1=>'Desktop', 2=>'Laptop',3=>'Tablet']);
            $table->string('title');
            $table->integer('department_id');
            $table->integer('section_id');
            $table->enum('laptop_issue', [1=>'Yes', 0=>'No']);
            $table->enum('monitor_issue', [1=>'Yes', 0=>'No']);
            $table->enum('docking_issue', [1=>'Yes', 0=>'No']);
            $table->enum('laptop_bag', [1=>'Yes', 0=>'No']);
            $table->enum('phone_issue', [1=>'Yes', 0=>'No']);
            $table->enum('lost', [1=>'Yes', 0=>'No']);
            $table->string('manufatured_by');
            $table->string('monitor_brand');
            $table->string('bag_type');
            $table->string('model_number');
            $table->string('monitor_model');
            $table->string('monitor_serial#');
            $table->string('serial_number');
            $table->string('phone_serial');
            $table->string('phone_model');
            $table->string('phone_issue_date');
            $table->string('phone_brand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custody_employee');
    }
}
