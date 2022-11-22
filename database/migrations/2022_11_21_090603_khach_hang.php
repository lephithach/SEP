<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KhachHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhachHang', function (Blueprint $table) {
            $table->string('SDTKhachHang', 12)->primary();
            $table->string('Ho', 30);
            $table->string('Ten', 10);
            $table->date('NgaySinh')->nullable();
            $table->integer('GioiTinh')->nullable();
            $table->string('DiaChi')->nullable();
            $table->string('Email', 50)->nullable();
            $table->string('CCCD', 12)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('KhachHang', function(Blueprint $table) {
            $table->index('SDTKhachHang');
        });
    }
}
