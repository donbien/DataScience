<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->increments('timetable_id');
            $table->string('faculty')->nullable();
            $table->string('study_year')->nullable();// TODO ADD A DELIMETER A HYPHEN
            $table->string('session_start')->nullable();
            $table->string('session_end')->nullable();
            $table->string('unit_name')->nullable();
            $table->string('unit_code')->nullable();
            $table->string('day_of_the_week')->nullable();
            $table->string('time')->nullable();
            $table->string('lecturer')->nullable();
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
        Schema::dropIfExists('timetables');
    }
}
