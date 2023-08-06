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
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('tanggal');
            $table->string('jenis');
            $table->double('nominal');
            $table->double('harga_asli');
            $table->double('harga_jual');
            $table->double('harga_bayar');
            $table->string('nama');
            $table->boolean('is_bayar');
            $table->integer('metode_id');
            $table->integer('wallet_id');
            $table->double('keuntungan');
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
        Schema::dropIfExists('catatans');
    }
};
