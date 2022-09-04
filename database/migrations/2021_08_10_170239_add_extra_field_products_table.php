<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
			
			$table->integer('state_id')->unsigned()->after('user_id');
			$table->foreign('state_id')->references('id')->on('state')->onDelete('cascade');
			$table->integer('dist_id')->unsigned()->after('state_id');
			$table->foreign('dist_id')->references('id')->on('districtwise')->onDelete('cascade');
			$table->integer('location_id')->unsigned()->after('dist_id');
			$table->foreign('location_id')->references('id')->on('location')->onDelete('cascade');
            $table->enum('sold', ['1', '0'])->default('0')->after('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
