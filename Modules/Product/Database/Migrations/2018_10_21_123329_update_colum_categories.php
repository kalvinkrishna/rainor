<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class UpdateColumCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::statement("ALTER TABLE product CHANGE COLUMN categories categories ENUM('pria', 'wanita', 'anak')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE product CHANGE COLUMN categories categories ENUM('pria', 'wanita')");
    }
}
