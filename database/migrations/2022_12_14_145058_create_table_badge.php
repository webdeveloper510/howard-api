<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBadge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge_employee', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('employee_id');
            $table->string('employee_name');
            $table->string('emp_type');
            $table->string('title');
            $table->string('department_id');
            $table->enum('visit', [1=>'Yes', 0=>'No']);
            $table->enum('lost', [1=>'Yes', 0=>'No']);
            $table->string('exist_badge')->default('NA');
            $table->string('shift_hour');
            $table->string('requested_by');
            $table->string('notes');
            $table->string('assigned_badge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badge_employee');
    }
}
