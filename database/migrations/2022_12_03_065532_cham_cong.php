<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChamCong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChamCong', function (Blueprint $table) {
            $table->bigIncrements('IDCC');
            $table->integer('MSNV')->index();
            $table->dateTime('NgayCham');
            $table->time('ChamVao');
            $table->time('ChamRa');
            $table->string('IPChamCong', 20);
            $table->boolean('Duyet');
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
