<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peb_change_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_number', 20);
            $table->dateTime('datetimechange');
            $table->string('internalpackingslipid', 30)->nullable();
            $table->string('packingslipid', 30)->nullable();
            $table->date('pebdatebaru');
            $table->date('pebdatelama');
            $table->string('userid', 50)->nullable();
            $table->string('dataareaid', 8)->nullable();
            $table->integer('recversion')->nullable();
            $table->string('partition_col', 50)->nullable();
            $table->string('recid', 50)->nullable();
            $table->dateTime('created_date')->useCurrent();
            $table->string('created_by', 30)->default('API_SYSTEM');
            $table->dateTime('synced_at')->nullable();

            $table->index('key_number', 'idx_pcl_key_number');
            $table->index('packingslipid', 'idx_pcl_packingslipid');
            $table->index('datetimechange', 'idx_pcl_datetimechange');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peb_change_log');
    }
};
