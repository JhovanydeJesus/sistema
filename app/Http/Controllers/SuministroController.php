<?php

namespace SistemadeVentas\Http\Controllers;
use SistemadeVentas\Producto;
use SistemadeVentas\Proveedor;
use SistemadeVentas\Suministro;
use SistemadeVentas\DetalleSuministro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Reponse;


use Illuminate\Http\Request;

class SuministroController extends Controller
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
        $suministros=DB::table('suministros')
           ->join('proveedores','suministros.id_proveedor','=','proveedores.id')
           ->select('suministros.*','proveedores.nombre')
           ->get();

         return view('adminlte::suministros.mostrar-suministros',['suministros'=>$suministros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
       $productos=DB::table('productos as prod')
       ->select(DB::raw('CONCAT(prod.clave," ",prod.descripcion)as producto '),'prod.imagen','prod.id')->get();

       $proveedores=Proveedor::all();
       return view('adminlte::suministros.agregar-suministro',['productos'=>$productos,'proveedores'=>$proveedores]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $productos = collect($request->productos);//lo convertimos en collection para utilizar metodos avanzados

        $suministroProveedores = $productos->groupBy('idProveedor');//agrupa por id proveedor
        
        $suministros = [];

/*
  proveedores = [
    //Proveedores
    idProv-1 => [
        //Filas o productos a agregar en el suministro -> $value
        [
          [procto 1, cantidad, preciocompra],
          [producto 2, .....]
          n
        ]
    ],

    idProv-2=> [
        //Filas o productos a agregar en el suministro
        [
          [procto 1, cantidad, preciocompra],
          [producto 2, .....]
          n
        ]
    ]  

  ]

 */
        foreach ($suministroProveedores as $proveedorId => $value){//recorrecemos de los suministros ordenados por proveedores
          $suministros[] = [ //por cada proveedor es un suministro
            'id_proveedor'=> $proveedorId,
            'fecha'=> date('Y-m-d'),
            'estado'=> 'Activo',
            'total' => 0,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ];
          //recorremos cada fila 
          collect($value)->each(function ($item, $key) use (&$suministros){
              $suministros[count($suministros)-1]['total'] += $item['cantidad'] * $item['precioCompra'];
          });
        }
/*
  suministros
    0 -> SuministroKey(La posicion)
       -> Valores (id_proveedor, fecha ...) ->objeto Suministro
    1 
      -> Valores .......

 */
      return DB::transaction(function () use ($suministros, $productos){

       /* Venta
        VentaDEtalles
        productosid -> stock -= venta->cantidad
        $producto->save*/

        foreach ($suministros as $suministroKey => $value) {
          $suministros[$suministroKey] = Suministro::create($value);
        }

        /* Implementar con esto en algun momento :) */
        //$suministros = Suministro::insert($suministros);

        $datosProductos = [];
        foreach ($productos as $productoKey => $productoValue) {
          $datosProductos[] = [
              'id_suministro' => collect($suministros)->where('id_proveedor', $productoValue['idProveedor'])->first()->id,
              'id_producto' =>  $productoValue['idProducto'],
              'cantidad' =>  $productoValue['cantidad'],
              'p_compra' =>  $productoValue['precioCompra'],
              'porcentaje_venta' =>  $productoValue['porcentajeVenta'],
              'monto' =>  $productoValue['cantidad'] * $productoValue['precioCompra'],
          ];

          $producto = Producto::find($productoValue['idProducto']);

          if($producto->stock == 0){
            $producto->stock = $productoValue['cantidad'];
            $producto->p_venta =  $productoValue['precioCompra'] * $productoValue['porcentajeVenta'];
            $producto->save();
          }

        }

        DetalleSuministro::insert($datosProductos);



        return redirect('suministros');
      });


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       
        $suministro=DB::table('suministros as sumi')
         ->join('proveedores','sumi.id_proveedor','=','proveedores.id')
         ->where('sumi.id','=',$id)
         ->select('proveedores.*','sumi.*')
         ->get();
      
        $DetalleSum=DB::table('Producto_Suministro as ps')
        ->join('productos', 'ps.id_producto','=','productos.id' )
        ->join('suministros','ps.id_suministro','=','suministros.id')
        ->where('ps.id_suministro','=',$id)
        ->select('ps.*','productos.clave','productos.descripcion')
        ->get();


        return view('adminlte::suministros.ver-suministro',compact('suministro','DetalleSum'));
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
