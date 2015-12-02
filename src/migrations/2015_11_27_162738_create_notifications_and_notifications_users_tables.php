<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsAndNotificationsUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('category');
            $table->text('subject');
            $table->text('body')->nullable();
            $table->string('showmodal', 2)->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('notification_user', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('notification_id');
            $table->integer('user_id');
            $table->timestamp('read_at')->nullable()->default(null);
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
        Schema::drop('notifications');
        Schema::drop('notification_user');
    }
}
