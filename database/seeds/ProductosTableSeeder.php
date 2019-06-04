<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use SistemadeVentas\Categoria;
use SistemadeVentas\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias=Categoria::all();

        foreach ($categorias as $categoria) 
        {
        	for ($i=0; $i <5 ; $i++) {

        	   Producto::create([
        	   	'clave'=>"clave$i",
        	   	'descripcion'=>"descripcion$i",
        	   	'p_venta'=>"22.$i",
        	   	'stock'=>"$i",
        	   	'imagen'=>"ruta$i",
        	   	'id_categoria'=>$categoria->id,

        	   ]);
        	}
        }
    }
}
