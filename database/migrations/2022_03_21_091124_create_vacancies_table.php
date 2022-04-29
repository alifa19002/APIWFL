<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('company_id')->references('id')->on('companies');
            $table->foreignId('company_id')->constrained('companies');
            $table->string('posisi');
            $table->text('jobdesc');
            $table->text('kriteria');
            $table->string('domisili');
            $table->string('min_pengalaman')->nullable();
            $table->string('insentif')->nullable();
            $table->string('link_pendaftaran');
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
        Schema::dropIfExists('vacancies');
    }
}
