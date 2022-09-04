<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Blogtable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->longtext('blog_desc');
            $table->string('image',100); 
            $table->integer('cate_id')->unsigned();
			$table->foreign('cate_id')->references('id')->on('blog_categories');
            $table->string('slug',200);
            $table->string('tag',200);
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
		
        DB::table('blogs')->insert(array(
            array(
            'title' => 'How To Start a Blog',
            'slug' => 'how-do-i-start-a-blog',
            'blog_desc' => 'So below, I’m going to outline exactly what you need to do to get started and set up your own personal blog. Before we dive in though, I really want to talk about WHY you should build a blog.
                            Note',
            'image' => '760192808.jpg',
            'tag' => 'HTML,Web Hosting,Domain Name,WordPress',
            'cate_id' => '1'
            )
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
