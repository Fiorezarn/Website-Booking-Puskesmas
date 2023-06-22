<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antreans', function (Blueprint $table) {
            $table->id();
            $table->string('namapasien');
            $table->integer('usia');
            $table->string('jeniskelamin');
            $table->string('kategori');
            $table->bigInteger('nik'); // Mengubah menjadi Big Integer
            $table->bigInteger('nohp'); // Mengubah menjadi Big Integer
            $table->string('alamat');
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
        Schema::dropIfExists('antreans');
    }
};
