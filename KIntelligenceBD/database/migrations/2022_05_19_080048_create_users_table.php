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
            $table->id();
            $table->string('name');
            $table->string('email',100)->unique();
            $table->string('phonenumber') -> unique() -> nullable();
            $table->string('nif') -> unique() -> nullable(); 
            $table->string('password') -> nullable() ;
            $table->string('birth')-> nullable();
            $table->string('address')-> nullable();
            $table->string('cc') -> unique() -> nullable();
            $table->string('civilState') -> nullable();
            $table->string('nib') -> unique() -> nullable();
            $table->string('nss') -> unique() -> nullable();
            $table->string('dependents') -> nullable();
            $table->string('category') -> nullable();
            $table->string('accType');
            $table->string('state') -> nullable();
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
        Schema::dropIfExists('users');
    }
}
