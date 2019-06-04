<?php

namespace SistemadeVentas\Http\Controllers;
use SistemadeVentas\Http\Requests\CategoriaCrearRequest;
use SistemadeVentas\Http\Requests\EditarCategoriaRequest;

use Illuminate\Http\Request;
use SistemadeVentas\Categoria;

class CategoriaController extends Controller
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
        $categoria=Categoria::all();

        return view('adminlte::categoria.mostrar-categoria',['categorias'=>$categoria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaCrearRequest $request)
    {
    
     /*if($request->ajax())
        {
       
            return response()->json
            ([
              "mensaje"=>"$request->all()"
            ]);
        }¨*/

        Categoria::create([
           'nombre'=>$request->get('nombre'),
           'estado'=>1,
        ]);

        return redirect('categorias')->with(['creadacat'=>'La categoria ha sido creada']);
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
    public function update(EditarCategoriaRequest $request, $id)
    {
       $categoria=Categoria::find($id);

       $categoria->nombre=$request->get('nombre');
       

       $categoria->update();

       return back()->with(['CatActualizada'=>'La Categoría ha sido actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->estado=0;
        $categoria->update();
        return back()->with(['Cateliminada'=>'La categoría ha sido eliminada correctamente']);
    }
}
