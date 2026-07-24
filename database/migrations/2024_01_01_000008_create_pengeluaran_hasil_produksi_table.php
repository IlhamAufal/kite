<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengeluaran_hasil_produksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_number', 20)->nullable();
            $table->string('peb_nomor', 10)->nullable();
            $table->date('peb_tanggal')->nullable();
            $table->string('bk_pengeluaran_nomor', 20)->nullable();
            $table->date('bk_pengeluaran_tanggal')->nullable();
            $table->string('pembeli', 60)->nullable();
            $table->string('negara_tujuan', 50)->nullable();
            $table->string('kode_barang', 20)->nullable();
            $table->string('nama_barang', 50)->nullable();
            $table->string('satuan', 10)->nullable();
            $table->decimal('jumlah', 18, 4)->nullable()->default(0);
            $table->string('mata_uang', 3)->nullable();
            $table->decimal('nilai_barang', 18, 2)->nullable()->default(0);
            $table->decimal('net_weight', 18, 4)->nullable()->default(0);
            $table->decimal('gross_weight', 18, 4)->nullable()->default(0);
            $table->decimal('total_kg_net', 18, 4)->nullable()->default(0);
            $table->decimal('total_kg_gross', 18, 4)->nullable()->default(0);
            $table->dateTime('created_date')->nullable()->useCurrent();
            $table->string('created_by', 20)->nullable()->default('API_SYSTEM');
            $table->dateTime('synced_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengeluaran_hasil_produksi');
    }
};
