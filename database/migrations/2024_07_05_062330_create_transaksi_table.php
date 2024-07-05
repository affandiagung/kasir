<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->text('resep')->nullable();
            $table->string('merk')->nullable();
            $table->float('left_size')->nullable();
            $table->float('right_size')->nullable();
            $table->string('type')->nullable();
            $table->decimal('harga', 8, 2);
            $table->decimal('diskon', 5, 2)->nullable();
            $table->decimal('total', 8, 2);
            $table->decimal('vascout', 8, 2)->nullable();
            $table->decimal('sisa', 8, 2)->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}
