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
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('jk', 1)->nullable();
            $table->string('no_telp')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('posisi')->nullable();
            $table->enum('role', array('0', '1', '2'))->default('0');
            // default: 0 (user), 1 (perusahaan), 2 (admin)
            $table->rememberToken();
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
