<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->string('gender');
            $table->string('birthDate');
            $table->string('profession');
            $table->string('contactNo');
            $table->string('mailingAddress')->nullable();
            $table->string('permanentAddress')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('managements');
    }
}
