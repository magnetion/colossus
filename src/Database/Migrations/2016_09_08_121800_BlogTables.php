<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('author_id');
            $table->integer('publish_date');
            $table->string('slug', 255);
            $table->string('title', 255);
            $table->text('content')->nullable();
            $table->text('summary')->nullable();
            $table->integer('status');
            $table->integer('comments_enabled')->default(0);
            $table->integer('comments_count')->default(0);
            $table->string('post_type', 20);
            $table->string('external_id', 100)->nullable();
            $table->timestamps();
        });


        Schema::create('blog_comment', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id');
            $table->string('display_name', 75);
            $table->string('email', 75)->nullable();
            $table->string('ip_address', 25)->nullable();
            $table->text('content');
            $table->integer('approved')->default(0);
            $table->integer('parent_id')->nullable();
            $table->integer('comment_date');
            $table->string('external_id', 100)->nullable();
            $table->timestamps();
        });


        Schema::create('blog_metadata', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('slug', 255);
            $table->string('type', 50);
            $table->integer('parent')->default(0);
            $table->integer('count')->default(0);
            $table->string('external_id', 100)->nullable();
            $table->timestamps();
        });


        Schema::create('blog_taxonomy', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id');
            $table->integer('metadata_id');
            $table->timestamps();
        });


        Schema::create('blog_author', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('email', 75)->nullable();
            $table->string('display_name', 100)->nullable();
            $table->string('website', 75)->nullable();
            $table->integer('status');
            $table->string('external_id', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_post');
        Schema::drop('blog_comment');
        Schema::drop('blog_metadata');
        Schema::drop('blog_taxonomy');
        Schema::drop('blog_author');
    }
}
