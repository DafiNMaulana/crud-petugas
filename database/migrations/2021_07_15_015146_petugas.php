<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Petugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Petugas', function (Blueprint $table) {
        $table->increments('petugas_id');
        $table->string('nama_petugas', 255)->nullable();
        $table->char('no_hp', 12)->nullable();
        $table->text('alamat_petugas', 255)->nullable();
        $table->timestamp('kolom_dibuat')->useCurrent();
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
        Schema::dropIfExists('petugas');
    }
}
