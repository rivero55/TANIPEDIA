<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->foreignId('category_id')->constrained('kategoris')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_toko')->constrained('tokos')->onUpdate('cascade')->onDelete('cascade');
            $table->text('deskripsi');
            $table->double('harga');
            $table->integer('stok')->length(11);
            $table->string('satuan');
            $table->string('img_path',255);
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
        Schema::dropIfExists('produks');
    }
}
