<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionStatusSlugAtTestTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_types', function (Blueprint $table) {
            $table->string('description')->nullable()->after('name');
            $table->string('status')->default('active')->after('description');
            $table->string('slug')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_types', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('status');
            $table->dropColumn('slug');
        });
    }
}
