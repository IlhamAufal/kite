<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pencatatan_penyesuaian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('peb_baru', 50)->nullable()->comment('PEBNUMBERB dari SQL Server');
            $table->string('peb_lama', 50)->nullable()->comment('PEBNUMBERL dari SQL Server');
            $table->string('packingslipid', 100)->nullable()->comment('PACKINGSLIPID / bukti pengeluaran nomor');
            $table->date('delivery_date')->nullable()->comment('DELIVERYDATE');
            $table->string('cust_name', 255)->nullable()->comment('CustName / pembeli');
            $table->string('county', 100)->nullable()->comment('COUNTY / negara tujuan');
            $table->string('item_id', 50)->nullable()->comment('ITEMID / kode barang');
            $table->string('item_name', 500)->nullable()->comment('ItemName / nama barang');
            $table->string('unit', 20)->nullable()->comment('Unit / satuan');
            $table->decimal('qty', 18, 4)->nullable()->comment('QTY / jumlah');
            $table->string('currency_code', 10)->nullable()->comment('CURRENCYCODE / mata uang');
            $table->decimal('amount', 18, 4)->nullable()->comment('Amount / nilai');
            $table->dateTime('synced_at')->nullable()->useCurrent();

            $table->unique(['packingslipid', 'item_id', 'delivery_date'], 'uq_packing_item_date');
            $table->index('delivery_date', 'idx_pp_delivery_date');
            $table->index('item_id', 'idx_pp_item_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pencatatan_penyesuaian');
    }
};
