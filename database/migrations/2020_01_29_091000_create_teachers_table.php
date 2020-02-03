<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('gender',10);
            $table->string('contactNo');
            $table->date('birthDate');
            $table->string('mailingAddress');
            $table->string('permanentAddress');
            // $table->string('ssc');
            // $table->string('hsc')->nullable();
            // $table->string('bachelor')->nullable();
            // $table->string('masters')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('teachers');
    }
}
