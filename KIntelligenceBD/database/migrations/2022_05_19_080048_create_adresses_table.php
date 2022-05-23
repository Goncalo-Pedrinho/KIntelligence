<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Addresses', function (Blueprint $table) {
            $table->id();
            $table->string('postalcod');
            $table->string('street');
            $table->string('number');
            $table->string('district');
            $table->string('country');
            $table->string('extra');
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
        Schema::dropIfExists('Addresses');
    }
}
