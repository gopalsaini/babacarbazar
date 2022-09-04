<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('email',100)->nullable();
            $table->string('mobile',100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['0', '1'])->default('1');
            $table->enum('user_type', ['1', '2'])->comment('1=>user, 2=>admin')->default('1');
            $table->string('password',100);
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        $pass = Hash::make('admin');
        DB::table('users')->insert(array(
            array(
                "name"=>'admin',
                "email"=>'admin@gmail.com',
                "mobile"=>'9988552266',
                "status"=>'1',
                "user_type"=>'2',
                "password"=>$pass ),
            array(
                "name"=>'user',
                "email"=>'user@gmail.com',
                "mobile"=>'8899663355',
                "status"=>'1',
                "user_type"=>'1',
                "password"=>$pass, )
        
        ));
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
