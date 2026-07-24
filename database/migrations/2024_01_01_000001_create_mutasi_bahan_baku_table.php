<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mutasi_bahan_baku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan', 10);
            $table->string('tahun', 10);
            $table->string('key_number', 20);
            $table->string('kode_barang', 20);
            $table->string('nama_barang', 150);
            $table->string('satuan', 10);
            $table->decimal('saldo_awal', 18, 4)->default(0);
            $table->decimal('pemasukan', 18, 4)->default(0);
            $table->decimal('pemasukan_lain', 18, 4)->default(0);
            $table->decimal('pengeluaran', 18, 4)->default(0);
            $table->decimal('pengeluaran_lain', 18, 4)->default(0);
            $table->decimal('saldo_akhir', 18, 4)->default(0);
            $table->string('gudang', 10);
            $table->dateTime('created_date')->useCurrent();
            $table->string('created_by', 10)->default('API_SYSTEM');
            $table->dateTime('synced_at')->nullable();

            $table->index('key_number', 'idx_key_number');
            $table->index('kode_barang', 'idx_kode_barang');
            $table->index(['bulan', 'tahun'], 'idx_bulan_tahun');
            $table->index('gudang', 'idx_gudang');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mutasi_bahan_baku');
    }
};
