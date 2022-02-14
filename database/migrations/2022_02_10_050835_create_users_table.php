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
            $table->bigIncrements("id",15);
            $table->unsignedBigInteger("role_id");
            $table->unsignedBigInteger("gender_id");
            $table->string("first_name",25);
            $table->string("middle_name",25);
            $table->string("last_name",25);
            $table->string("email",50);
            $table->string("password",255); //nvarchar!!!
            $table->string("display_picture_link",255);
            $table->integer("delete_flag")->nullable();
            $table->date("modified_at")->nullable();
            $table->string("modified_by",255)->nullable();
            $table->timestamps();
            $table->rememberToken();

            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
            $table->foreign('gender_id')->references('gender_id')->on('genders')->onDelete('cascade');
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
