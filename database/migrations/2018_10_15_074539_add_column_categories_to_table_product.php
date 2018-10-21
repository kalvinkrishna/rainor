<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategoriesToTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            

            if(!Schema::hasColumn('product_name','product')){
                $table->string('product_name',100)->after('id')->nullable();
            }
            if(!Schema::hasColumn('price','product')){
                $table->double('price','100')->after('product_name')->default(0);
            }
            if(!Schema::hasColumn('discount','product')){
                $table->double('discount','100')->after('price')->default(0);
            }
            if(!Schema::hasColumn('tax','product')){
                $table->double('tax','100')->after('discount')->default(0);
            }            
            if(!Schema::hasColumn('categories','product')){
                $table->enum('categories',['pria','wanita'])->after('product_name');
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
        Schema::table('product', function (Blueprint $table) {
            if(Schema::hasColumn('categories','product')){
                $table->dropColumn('categories');
            }

            if(!Schema::hasColumn('product_name','product')){
               $table->dropColumn('product_name');
            }
        });
    }
}
