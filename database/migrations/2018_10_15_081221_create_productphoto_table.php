<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductphotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productphoto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_product')->unsigned()->index();
            $table->string('url','200')->nullable();
            

            $table->foreign(['id_product'])
                ->references('id')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::table('productphoto', function (Blueprint $table) {
            $table->dropForeign(['id_product']);
            $table->dropColumn([
                'id_product'
            ]);

        });
        Schema::dropIfExists('productphoto');
    }
}
