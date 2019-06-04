<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace SistemadeVentas\Http\Controllers;

use SistemadeVentas\Http\Requests;
use Illuminate\Http\Request;
use SistemadeVentas\Producto;
use SistemadeVentas\Suministro;
use SistemadeVentas\Proveedor;
use SistemadeVentas\Venta;


/**
 * Class HomeController
 * @package SistemadeVentas\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
       $productos=Producto::count();
       $suministros=Suministro::count();
       $proveedores=Proveedor::count();
       $ventas=Venta::count();

        return view('adminlte::home',['productos'=>$productos,'suministros'=>$suministros,'proveedores'=>$proveedores,'ventas'=>$ventas]);
    }
}