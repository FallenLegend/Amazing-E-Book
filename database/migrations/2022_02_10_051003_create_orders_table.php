<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements("order_id");
            $table->unsignedBigInteger("account_id");
            $table->unsignedBigInteger("ebook_id");
            $table->date("order_date");
            $table->timestamps();

            $table->foreign("account_id")->references("id")->on("users")->onDelete('cascade');
            $table->foreign("ebook_id")->references("ebook_id")->on("ebooks")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
