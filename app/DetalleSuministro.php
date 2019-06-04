<?php

namespace SistemadeVentas;

use Illuminate\Database\Eloquent\Model;

class DetalleSuministro extends Model
{
     protected $table = 'producto_suministro';
      protected $primaryKey = 'id';

  	 protected $fillable = ['id_suministro','id_producto','cantidad','p_compra','porcentaje_venta','monto' ];

	   public function productos()
	   {
	   	 return $this->hasMany('SistemadeVentas\Producto','id_producto');
	   }
}
