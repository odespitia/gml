<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // $table->id();
            $table->uuid('id')->primary();
            $table->string('document',10)->unique();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->integer('movil')->unsigned();
            $table->string('address',180)->nullable();
            $table->string('email',150)->unique();
            $table->unsignedTinyInteger('country');
            $table->unsignedTinyInteger('status_id');
            $table->unsignedTinyInteger('category_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('category_id')->references('id')->on('categories');
        });
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
