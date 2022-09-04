<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned()->default('1')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('category_id')->unsigned()->onDelete('cascade');
			$table->foreign('category_id')->references('id')->on('procategories');
			$table->integer('brand_id')->unsigned()->onDelete('cascade');
			$table->foreign('brand_id')->references('id')->on('brands');
			$table->integer('model_id')->unsigned()->onDelete('cascade');
			$table->foreign('model_id')->references('id')->on('models');
			$table->integer('variant_id')->unsigned()->nullable()->onDelete('cascade');
			$table->foreign('variant_id')->references('id')->on('variants');
			$table->string('year',100);
			$table->string('fuel',100)->nullable();
			$table->string('transmission',100)->nullable();
			$table->string('km_drive',100);
			$table->string('owners',100);
			$table->longText('images');
            $table->longText('pro_desc');
            $table->decimal('price', 18, 2);
			$table->enum('status', ['1', '0'])->default('0');
            $table->enum('featured', ['1', '0'])->default('0');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

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
