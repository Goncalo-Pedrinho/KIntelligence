<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('description');
            $table->string('model');
            $table->string('merch');
            $table->string('category');
            $table->string('subdescription');
            $table->integer('stock');
            $table->unsignedBigInteger('categoryid');
            $table->foreign('categoryid')->references('id')->on('categorys');
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
        Schema::dropIfExists('Products');
    }
}