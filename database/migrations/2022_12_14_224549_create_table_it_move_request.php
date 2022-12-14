<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItMoveRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('it_move', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('requestor_name');
            $table->string('last_name');
            $table->string('requestor_email');
            $table->string('department');
            $table->string('move_from');
            $table->string('move_to');
            $table->string('additional_detail');
            $table->string('manager_approval');
            $table->string('resolution');
            $table->string('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('it_move');
    }
}
