<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcquireProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acquireProducts', function (Blueprint $table) {
            $table->unsignedBigInteger('clientId')->unsigned(); 
            $table->foreign('clientId')->references('id')->on('users');
            $table->unsignedBigInteger('productId')->unsigned();
            $table->foreign('productId')->references('id')->on('Products');
            $table->date('date');
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
        Schema::dropIfExists('acquireProducts');
    }
}
