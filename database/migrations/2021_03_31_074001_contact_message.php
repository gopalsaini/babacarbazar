<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactMessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('email',100);
            $table->string('mobile',100);
            $table->longText('message');
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        DB::table('contacts')->insert(array(
            array(
                'name' => 'IMG',
                'email' => 'img@gmail.com',
                'mobile' => '7788559556',
                'status' => '1',
                'message' => 'World Class Infant Nutrition<br>By Milk Baby Dairy'),
            array(
                'name' => 'Gopal',
                'email' => 'imggopal@gmail.com',
                'mobile' => '7788559966',
                'status' => '1',
                'message' => 'World Class Infant Nutrition<br>By Milk Baby Dairy')
        
        ));
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
