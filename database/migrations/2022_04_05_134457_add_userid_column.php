<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseridColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) { 
            $table->string('username')->nullable();
            $table->integer('user_level')->nullable();
            $table->integer('user_enable')->nullable();
            $table->text('user_def')->nullable();
            $table->string('user_reg')->nullable();
            $table->string('kode_opd')->nullable();
            $table->integer('id_opd')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
