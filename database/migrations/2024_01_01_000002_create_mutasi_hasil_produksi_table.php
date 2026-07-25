<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mutasi_hasil_produksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bulan', 10);
            $table->string('tahun', 10);
            $table->string('kode_barang', 50);
            $table->string('nama_barang', 250);
            $table->string('satuan', 50);
            $table->decimal('saldo_awal', 18, 4)->default(0);
            $table->decimal('pemasukan', 18, 4)->default(0);
            $table->decimal('pemasukan_other', 18, 4)->default(0);
            $table->decimal('pengeluaran', 18, 4)->default(0);
            $table->decimal('pengeluaran_other', 18, 4)->default(0);
            $table->decimal('saldo_akhir', 18, 4)->default(0);
            $table->string('gudang', 10);
            $table->dateTime('created_date')->useCurrent();
            $table->string('created_by', 50)->default('API_SYSTEM');
            $table->dateTime('synced_at')->nullable();

            $table->index('kode_barang', 'idx_mhp_kode_barang');
            $table->index(['bulan', 'tahun'], 'idx_mhp_bulan_tahun');
            $table->index('gudang', 'idx_mhp_gudang');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mutasi_hasil_produksi');
    }
};
