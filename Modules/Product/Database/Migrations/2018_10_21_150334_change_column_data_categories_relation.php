<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnDataCategoriesRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories_relation', function (Blueprint $table) {
        
            $table->foreign('id_product')->references('id')->on('product')->chage();
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
            $table->dropForeign(['id_product']);
        });
    }
}
