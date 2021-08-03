<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
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
            $table->integer('author_id');
            $table->integer('category_id');
            $table->string('title');
            $table->longText('description');
            $table->text('content');
            $table->string('image');
            $table->string('blog_slug')->unique();
            $table->integer('status')->default(1);
            $table->integer('views');
            $table->timestamps();

            // $table->foreign('author_id')
            //       ->references('id')->on('users')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
