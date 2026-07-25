<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemakaian_bahan_baku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengeluaran', 20);
            $table->date('tgl_pengeluaran');
            $table->string('id_product', 25);
            $table->string('name_product', 50);
            $table->string('uom', 10)->nullable();
            $table->decimal('qty_usage', 18, 4)->default(0);
            $table->string('warehouse', 10);
            $table->string('penerima_subkontrak', 50)->nullable();
            $table->decimal('jumlah_disubkontrakkan', 18, 4)->default(0);
            $table->string('created_by', 10)->default('API_SYSTEM');
            $table->dateTime('created_date')->useCurrent();
            $table->dateTime('synced_at')->nullable();

            $table->index('no_pengeluaran', 'idx_pbb_no_pengeluaran');
            $table->index('id_product', 'idx_pbb_id_product');
            $table->index('tgl_pengeluaran', 'idx_pbb_tgl_pengeluaran');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemakaian_bahan_baku');
    }
};
