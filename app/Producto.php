<?php

namespace SistemadeVentas;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   protected $table = 'productos';

    protected $fillable = ['id','clave','descripcion','p_venta','stock','imagen','id_categoria','estado'];

   public function categoria()
   {
   	 return $this->belongsTo('SistemadeVentas\Categoria');
   }

    
    
}
