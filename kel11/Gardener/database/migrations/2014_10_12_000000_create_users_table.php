<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_ktp');
            $table->string('nama_lengkap');
            $table->string('nomor_hp');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('level',['1','2'])->defaultValue('2');
            $table->timestamps();
        });
        Schema::create('gardener', function (Blueprint $table) {
            $table->id();
            $table->string('project');
            $table->string('keterangan');
            $table->string('status')->nullable();
        });
        Schema::create('koperasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('harga_barang');
            $table->string('stok');
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::create('pulsa', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pulsa');
            $table->string('nama_pulsa');
            $table->string('jenis_pulsa');
            $table->string('harga_pulsa');
            $table->string('stok');
            $table->string('gambar');
            $table->timestamps();
        });

        Schema::create('ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_ruangan');
            $table->string('nomor_ruangan');
            $table->string('status_ruangan');
            $table->date('dipakai')->nullable(); 
            $table->date('selesai')->nullable(); 
            $table->timestamps();
        });

        Schema::create('orders', function( Blueprint $table ) {
            $table->id();
            $table->string('jenis_order');
            $table->string('jumlah_order');
            $table->string('harga_order');
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