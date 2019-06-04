<?php

namespace SistemadeVentas\Http\Controllers;


use Illuminate\Http\Request;
use SistemadeVentas\Proveedor;
use SistemadeVentas\Http\Requests\CrearProveedorRequest;
use SistemadeVentas\Http\Requests\EditarProveedorRequest;

class ProveedorController extends Controller
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
        $proveedores=Proveedor::all();
        return view('adminlte::proveedores.mostrar-proveedores',['proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte::proveedores.agregar-proveedor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearProveedorRequest $request)
    {
        Proveedor::create(
            [
              'nombre'=>$request->get('nombre'),
              'ciudad'=>$request->get('ciudad'),
              'direccion'=>$request->get('direccion'),
              'cod_post'=>$request->get('cod_post'),
              'telefono'=>$request->get('telefono'),
              'estado'=>'Activo',
            ]);

        return redirect('proveedores')->with(['proveedorSt'=>'El proveedor ha sido agregado correctamente']);
        
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
        $proveedor=Proveedor::findOrFail($id);

         
        return view('adminlte::proveedores.editar-proveedor',['proveedor'=>$proveedor]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarProveedorRequest $request, $id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->fill($request->all());
        $proveedor->update();

        return redirect('proveedores')->with(['provedorUp'=>'El proveedor ha sido modificado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor=Proveedor::findOrFail($id);
        $proveedor->estado='Eliminada';
        $proveedor->update();

        return redirect('proveedores')->with(['proveedorDE'=>'El proveedor ha sido eliminado correctamente']);
    }
}
