<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemasukan_hasil_produksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dokumen_nomor', 20)->nullable();
            $table->date('dokumen_tanggal')->nullable();
            $table->string('kode_barang', 20)->nullable();
            $table->string('nama_barang', 150)->nullable();
            $table->string('satuan', 10)->nullable();
            $table->decimal('jumlah_produksi', 18, 4)->nullable()->default(0);
            $table->decimal('jumlah_subkon', 18, 4)->nullable()->default(0);
            $table->string('gudang', 5)->nullable();
            $table->dateTime('created_date')->nullable()->useCurrent();
            $table->string('created_by', 10)->nullable()->default('API_SYSTEM');
            $table->dateTime('synced_at')->nullable();

            $table->index('dokumen_nomor', 'idx_php_dokumen_nomor');
            $table->index('kode_barang', 'idx_php_kode_barang');
            $table->index('dokumen_tanggal', 'idx_php_dokumen_tanggal');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemasukan_hasil_produksi');
    }
};
