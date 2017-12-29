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
            $table->integer('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email');
            $table->string('user_url')->nullable();
            $table->string('ip_address');
            $table->boolean('is_public')->default(true);
            $table->boolean('is_removed')->default(false);
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
