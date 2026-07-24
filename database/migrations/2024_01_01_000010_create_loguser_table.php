<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('loguser', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('userid', 15);
            $table->string('ip_address', 45)->nullable();
            $table->enum('status', ['success', 'failed'])->default('failed');
            $table->string('user_agent', 255)->nullable();
            $table->dateTime('login_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loguser');
    }
};
