<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoSuministroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('producto_suministro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_suministro')->unsigned();
            $table->integer('id_producto')->unsigned();
            $table->integer('cantidad');
            $table->float('p_compra',8,2);
            $table->float('porcentaje_venta',1,1);
            $table->float('monto',8,2);

            $table->foreign('id_suministro')->references('id')->on('suministros');
            $table->foreign('id_producto')->references('id')->on('productos');
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
         Schema::dropIfExists('producto_suministro');
    }
}
