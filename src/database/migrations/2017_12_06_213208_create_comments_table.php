<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment');
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_url');
            $table->string('ip_address');
            $table->boolean('is_public');
            $table->boolean('is_removed');
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
