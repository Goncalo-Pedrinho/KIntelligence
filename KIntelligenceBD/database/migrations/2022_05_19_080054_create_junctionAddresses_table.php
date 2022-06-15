<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJunctionAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('junction_adresses', function (Blueprint $table) {
            $table->unsignedBigInteger('clientId')->unsigned(); 
            $table->foreign('clientId')->references('id')->on('users');
            $table->unsignedBigInteger('addressId')->unsigned();
            $table->foreign('addressId')->references('id')->on('Addresses');
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
        Schema::dropIfExists('junction_adresses');
    }
}
