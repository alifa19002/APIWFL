<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('user_id')->constrained('users');
            //$table->foreignId('postingan_id')->references('id')->on('posts');
            $table->foreignId('postingan_id')->constrained('posts');
            $table->string('alasan');
            $table->enum('is_approved', array('0', '1'))->default('0');
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
        Schema::dropIfExists('reports');
    }
}
