<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuministrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suministros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proveedor')->unsigned();
            $table->date('fecha');
            $table->float('total',8,2);
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
             
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
        Schema::dropIfExists('suministros');
    }
}
