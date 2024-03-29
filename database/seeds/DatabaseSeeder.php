<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use SistemadeVentas\Categoria;
use SistemadeVentas\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0'); 

        Categoria::truncate();
        Producto::truncate();

        $this->call('CategoriasTableSeeder');
        $this->call('ProductosTableSeeder');

    }
}
