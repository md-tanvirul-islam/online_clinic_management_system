<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->integer('generic_id')->index()->default(0);
            $table->string('brand_name',255);
            $table->string('form',255)->nullable(); //capsul,syrup,injection,inhaler,suppository etc...
            $table->string('strength', 250)->nullable(); //500mg, 250mg, 10g
            $table->text('dosage_description')->nullable();
            $table->string('status', 50)->default('accepted');
            $table->string('other_info', 255)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('medicines');
    }
}
