<?php

namespace SistemadeVentas;

use Illuminate\Database\Eloquent\Model;

class Suministro extends Model
{
   protected $table = 'suministros';


   protected $fillable = ['id','id_proveedor','fecha','total','estado']; 

   public function proveedor()
   {
   	 return $this->belongsTo('SistemadeVentas\Proveedor','id_proveedor');
   }

  /* public function productos()
   {
   	return $this->belongsToMany('SistemadeVentas\Producto');//desglose suministro
   }*/
}
