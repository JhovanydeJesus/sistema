<?php

namespace SistemadeVentas;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   protected $table = 'categorias';

   protected $fillable = ['nombre','estado'];

   public function productos()
   {
   	 return $this->hasMany('SistemadeVentas\Producto');
   }

}
