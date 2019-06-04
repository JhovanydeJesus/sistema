<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use SistemadeVentas\Categoria;
use SistemadeVentas\Producto;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i=0; $i <3 ; $i++) {

       	Categoria::create([
         'nombre'=>"categoria$i",
       	]);
       }
    }
}
