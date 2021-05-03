<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewsToKitchenfurnituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kitchenfurnitures', function (Blueprint $table) {
            $table->string('views')->default(0)->after('image');
            $table->string('likes')->default(0)->after('views');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kitchenfurnitures', function (Blueprint $table) {
            //
        });
    }
}
