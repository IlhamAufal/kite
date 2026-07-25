<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemasukan_bahan_baku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_rekam');
            $table->string('doc_type', 20);
            $table->string('nomor_pib', 10);
            $table->date('tanggal_pib');
            $table->string('kode_hs', 50)->nullable();
            $table->string('gr_number', 50)->nullable();
            $table->date('gr_date')->nullable();
            $table->string('id_product', 25);
            $table->string('name_product', 50);
            $table->string('uom', 10)->nullable();
            $table->decimal('qty', 18, 4)->default(0);
            $table->string('currency', 3)->nullable();
            $table->decimal('amount', 18, 2)->default(0);
            $table->string('warehouse', 10)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('penerima_subkontrak', 50)->nullable();
            $table->dateTime('created_date')->useCurrent();
            $table->string('created_by', 30)->default('API_SYSTEM');
            $table->dateTime('synced_at')->nullable();

            $table->index('nomor_pib', 'idx_pmbb_nomor_pib');
            $table->index('id_product', 'idx_pmbb_id_product');
            $table->index('tanggal_pib', 'idx_pmbb_tanggal_pib');
            $table->index('tgl_rekam', 'idx_pmbb_tgl_rekam');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemasukan_bahan_baku');
    }
};
