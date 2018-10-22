<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnDataCategoryproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories_relation', function (Blueprint $table) {
            $table->foreign('categories')->references('id')->on('categories')->chage();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories_relation', function (Blueprint $table) {
            $table->dropForeign(['categories']);
        });
    }
}
