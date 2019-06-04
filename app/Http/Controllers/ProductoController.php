<?php

namespace SistemadeVentas\Http\Controllers;

use Illuminate\Http\Request;
use SistemadeVentas\Http\Requests\CrearProductoRequest;
use SistemadeVentas\Http\Requests\EditarProductoRequest;
use SistemadeVentas\Producto;
use SistemadeVentas\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;




class ProductoController extends Controller
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
       //$productos=Categoria::all();
     $productos= DB::table('categorias')
            ->join('productos', 'categorias.id', '=', 'productos.id_categoria')
            ->select('categorias.nombre','productos.*')
            ->get();

   
       return view('adminlte::productos.mostrar-producto',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //$categoria=Categoria::all()->pluck('nombre', 'id'); solo funciona con laravel colective;
        $categoria=Categoria::all();

        return view('adminlte::productos.agregar-producto',['categoria'=>$categoria]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearProductoRequest $request)
    {
      

      if($request->hasFile('imagen'))
          {
            $imagen=$request->file('imagen');
            $nombre=time().$imagen->getClientOriginalName();
            $ruta='/images/';
            $imagen->move(public_path().$ruta,$nombre);


             Producto::create
             ([
                'clave'=>$request->get('clave'),
                'descripcion'=>$request->get('descripcion'),
                'stock'=>0,
                'id_categoria'=>$request->get('id_categoria'),
                'p_venta'=>'0.00',
                'imagen'=>$ruta.$nombre,
                'estado'=>'Activo',
             ]);
          }
     
           return redirect('productos')->with(['Agregado'=>'El producto ha sido agregado exitosamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return 'Hola mundo';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        /* $productocat= DB::table('categorias')
            ->join('productos', 'categorias.id', '=', 'productos.id_categoria')
            ->select('categorias.*','productos.*')
            ->where('productos.id', '=', $id)
            ->get();*/
         $producto = Producto::findOrFail($id);
     
        $categoria = DB::table('categorias')->where('categorias.id', '=',$producto->id_categoria)->get();
        $categorias=Categoria::all();


       return view('adminlte::productos.editar-productos',['producto'=>$producto,'categorias'=>$categorias,'categoria'=>$categoria]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditarProductoRequest $request, $id)
    {

        $producto=Producto::findOrFail($id);
        $producto->clave=$request->get('clave');
        $producto->descripcion=$request->get('descripcion');
        $producto->p_venta=$request->get('p_venta');
        $producto->stock=$request->get('stock');
       
        if($request->hasFile('imagen'))
          {

            $imagen=$request->file('imagen');
            $nombre=time().$imagen->getClientOriginalName();
            $ruta='/images/';
            $imagen->move(public_path().$ruta,$nombre);

            $rutaanterior=public_path().$producto->imagen;
            
            if(file_exists($rutaanterior)) //aca tambien preguntamos si enrealidad existe el archivo de $rutaanterior para que se pueda eliminar la imagen. 
            {
              unlink(realpath($rutaanterior));// ahora vamos a eliminar la foto por medio de la ruta anterior
             }

            //y una ves que ya este eliminado vamos a decir que guarde los datos de la ruta

            $producto->imagen=$ruta.$nombre;
         }

        //Producto::where('id','=',$id)->update($producto->imagen);
        $producto->id_categoria=$request->get('id_categoria');

        //$producto=Producto::findOrFail($id);
        $producto->update();

        return redirect('productos')->with(['Actualizada'=>'El producto ha sido modificado correctamente ']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

 
       $producto=Producto::findOrFail($id);
       $producto->estado='Eliminada';
       $producto->update();
       return redirect('productos')->with(['Eliminada'=>'El producto ha sido eliminado correctamente ']);
    }
}
