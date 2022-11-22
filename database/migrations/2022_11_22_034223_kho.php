<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kho', function (Blueprint $table) {
            $table->bigIncrements('ID_SP');
            $table->string('TenSP', 200);
            $table->integer('SoLuong');
            $table->integer('GiaNhap')->nullable();
            $table->integer('GiaBan')->nullable();
            $table->integer('DatHang')->nullable();
            $table->integer('KhaDung')->nullable();
            $table->dateTime('NgayNhap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
