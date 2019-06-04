<?php

namespace SistemadeVentas\Http\Controllers;

use Illuminate\Http\Request;
use SistemadeVentas\Producto;
use DB;

class VentaController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminlte::ventas.mostrar-venta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$query=Producto::where('p_venta','>',0)->with()
       //$query=Producto::where('p_venta','>',0)->get();
         $productos=DB::table('productos as prod')
           ->select(DB::raw('CONCAT(prod.clave," ",prod.descripcion)as producto '),'prod.id','prod.stock','prod.p_venta','prod.imagen')
           ->where('prod.p_venta','>',0 ,'and' ,'prod.stock','>',0,'and','prod.estado','=','Activo')
           ->get();
       
      
       return view('adminlte::ventas.nueva-venta',['productos'=>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
