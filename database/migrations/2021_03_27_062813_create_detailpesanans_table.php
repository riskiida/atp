<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailpesanans', function (Blueprint $table) {
            $table->id();
            $table->string('produk_id');
            $table->integer('pesanan_id');
            $table->integer('jumlah');
            $table->integer('harga_produk');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade')->onUpdate('cascede');
             $table->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('cascade')->onUpdate('cascede');
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
        Schema::dropIfExists('detailpesanans');
    }
}
