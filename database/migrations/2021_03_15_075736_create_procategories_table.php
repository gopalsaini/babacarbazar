<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cate_title', 100);
            $table->integer('parent_id');
            $table->text('cate_desc');
            $table->string('image',100); 
            $table->string('slug',100);
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

        });

        DB::table('procategories')->insert(array(
            array(
            'cate_title' => 'Dairy & Fresh Panee',
            'parent_id' => '0',
            'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
            'slug' => 'dairy-&-fresh-panee',
            'image' => '90618464.png',
            'status' => '1', ),
            array(
                'cate_title' => 'Fresh Chakki Aatta',
                'parent_id' => '0',
                'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
                'slug' => 'fresh-chakki-aatta',
                'image' => '34125818.png',
                'status' => '1', ),
            array(
                'cate_title' => 'Fresh Fruits',
                'parent_id' => '0',
                'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
                'slug' => 'fresh-fruits',
                'image' => '96060480.png',
                'status' => '1', ),
            array(
                'cate_title' => 'Fresh Vegetables',
                'parent_id' => '0',
                'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
                'slug' => 'fresh-vegetables',
                'image' => '40430921.png',
                'status' => '1', ),
            array(
                'cate_title' => 'Glucose',
                'parent_id' => '0',
                'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
                'slug' => 'glucose',
                'image' => '52947923.png',
                'status' => '1', ),
            array(
                'cate_title' => 'Glucose sub category',
                'parent_id' => '1',
                'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
                'slug' => 'glucose-sub-category',
                'image' => '52947923.png',
                'status' => '1', ),
            array(
                'cate_title' => 'Fresh Vegetables sub category',
                'parent_id' => '2',
                'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
                'slug' => 'fresh-vegetables-sub-category',
                'image' => '52947923.png',
                'status' => '1', ),
            array(
                'cate_title' => 'Fresh Fruits sub category',
                'parent_id' => '3',
                'cate_desc' => 'World Class Infant Nutrition<br>By Milk Baby Dairy',
                'slug' => 'fresh-fruits-sub-category',
                'image' => '52947923.png',
                'status' => '1', )
    
        ));

    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procategories');
    }
}
