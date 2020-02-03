<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeacherInfo2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_info_twos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('teacher_id');
            $table->string('degree');
            $table->string('passing_year')->nullable();
            $table->string('batch')->nullable();
            $table->string('department')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('result')->nullable();
            $table->string('board')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('publish')->default(0);
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
        //
    }
}
