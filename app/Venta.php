<?php

namespace SistemadeVentas;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
   protected $table = 'ventas';

   protected $fillable = ['id','fecha','total','estado']; //falto monto

   
}
