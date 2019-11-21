<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          
        Schema::create('student_results', function (Blueprint $table) {
            $table->integer('student_number');
            $table->string('unit_code');
            $table->boolean('status')->nullable(); // dependent on marks pass or fail
            $table->string('class')->nullable(); // dependent on column marks(Repeat,Retake,Special)
            $table->float('marks');
            $table->timestamps();

            $table->foreign('student_number')->references('student_number')->on('students');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
