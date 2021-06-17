<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->foreignId('department_id')->constrained('departments');
            $table->string('address')->nullable();
            $table->string('phoneNo')->nullable();
            $table->string('mobileNo')->nullable();
            $table->string('image')->nullable();
            $table->string('speciality')->nullable();
            $table->string('degree')->nullable();
            $table->text('bio')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodGroup')->nullable();
            $table->string('feeNew')->nullable();
            $table->string('feeInMonth')->nullable();
            $table->string('feeReport')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
