<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DoNoiThat', function (Blueprint $table) {
            $table->id();
            $table->string('TenDNT');
            // $table->double('price');
            $table->text('MoTa');
            $table->string('HinhAnh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DoNoiThat');
    }
};
