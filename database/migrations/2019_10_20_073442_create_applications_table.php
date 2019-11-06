<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('application_id');
            $table->integer('student_number');
            $table->string('faculty');
            $table->string('unit_name');
            $table->string('unit_code');
            $table->string('type_of_application'); // Repeat,Retake or Special
            $table->date('date_posted');
            $table->longText('letter_of_reason');
            $table->boolean('status'); // Approved or Not
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
        Schema::dropIfExists('applications');
    }
}
