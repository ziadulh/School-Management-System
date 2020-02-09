<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->tinyInteger('class',2);
            $table->string('email',40);
            $table->string('gender');
            $table->string('birthDate');
            $table->string('contactNo');
            $table->string('mailingAddress');
            $table->string('permanentAddress');
            $table->string('localGurdianName');
            $table->string('localGuardianContactNo');
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
        Schema::dropIfExists('admissions');
    }
}
