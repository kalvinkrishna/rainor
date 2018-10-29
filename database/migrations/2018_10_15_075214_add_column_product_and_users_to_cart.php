<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProductAndUsersToCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            if(!Schema::hasColumn('id_user','cart')){
                $table->integer('id_products')->after('id');
            }
            if(!Schema::hasColumn('id_user','cart')){
                $table->integer('id_user')->after('id_products');
            }

            if(!Schema::hasColumn('is_checkout','cart')){
                $table->enum('is_checkout',['checkout','standby'])->after('id_user');
            }
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            if(Schema::hasColumn('id_user','cart')){
                $table->dropColumn('id_user');
            }
            if(Schema::hasColumn('id_products','cart')){
                $table->dropColumn('id_product');
            }

            if(Schema::hasColumn('is_checkout','cart')){
                $table->dropColumn('is_checkout');
            }
        });
    }
}
