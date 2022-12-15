<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTerminate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminate_office', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('manager_name');
            $table->string('last_name');
            $table->string('manager_email');
            $table->string('title');
            $table->string('effective_date');
            $table->string('priority');
            $table->string('employee_name');
            $table->string('emp_last_name');
            $table->string('emp_job_title');
            $table->string('badge');
            $table->string('collected')->comment('1: Yes; 2:No ;');
            $table->string('location');
            $table->string('code');
            $table->string('equipment_collected');
            $table->text('soft_removal');
            $table->text('instruction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminate_office');
    }
}
