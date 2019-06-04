<?php

namespace SistemadeVentas;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
   protected $table = 'proveedores';

   protected $fillable = ['id','nombre','direccion','ciudad','cod_post','telefono','estado'];

   public function Suministros_prov()
   {
   	 return $this->hasMany('SistemadeVentas\Suministro'); 
   }
}