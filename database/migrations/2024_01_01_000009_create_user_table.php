<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('userid', 15)->nullable();
            $table->string('userpswd', 25)->nullable();
            $table->string('company', 50)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user');
    }
};
