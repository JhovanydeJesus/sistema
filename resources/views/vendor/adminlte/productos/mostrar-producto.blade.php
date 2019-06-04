@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Productos') }}
@endsection

@section('contentheader_title')
		<a href="{{url('productos/create')}}" class="btn bg-olive" role="button">
		<li class="glyphicon glyphicon-plus" ></li>
		Agregar Nuevo
	    </a> 
@endsection


@section('main-content')
  @include('adminlte::alerts.alertas')
  
	<div class="panel panel-primary">
	  <div class="panel-heading">

	  	<h4 class="panel-title"><i class="fa fa-cubes"></i>
	  	Catalogo Productos
	    </h4>
	    </div>
	  <div class="panel-body">
	  	 @if(sizeof($productos)>0)
	    <div class="table-responsive">
		  <table id="producto" class="table table-hover">	
		         <thead>
			        <tr>
			        	
			        	<th>Clave</th>
			            <th>Descripcion</th>
			            <th>P_venta</th>
			            <th>Stock</th>
			            <th>Categoría</th>
			            <th>Estado</th>
			            <th>Imagen</th>
			            <th>Acciones</th>
			            
			           
			        </tr>
			    </thead>
			    
			    <tbody>
			   
			      @foreach ($productos as $producto)
			        <tr>

	                    <td>{{$producto->clave}}</td>
			            <td>{{$producto->descripcion}}</td>

			            @if($producto->p_venta==0)
			            <td><span class="badge bg-yellow">Pendiente</span></td>
			             @else 
			               <td>{{$producto->p_venta}}</td>
			             @endif
                        
                        @if($producto->stock==0)
			            <td><span class="badge  bg-yellow">Pendiente</span></td>
			             @else 
			               <td>{{$producto->stock}}</td>
			             @endif

			            <td>{{$producto->nombre}}</td>

			            @if($producto->estado=='Activo')
			             <td><span class="badge bg-teal">{{$producto->estado}}</span></td>
			            @else
			            <td ><span class="badge">{{$producto->estado}}</span></td>
			            @endif

			            <td><img src="..{{$producto->imagen}}" alt="{{ $producto->descripcion }}" height="80" width="80" class="img-thumbnail"></td>
			                
			             <td> 
			            	<a href="productos/{{$producto->id}}/edit" class="btn btn-warning" role="button">
                             <i class="fa fa-edit"  ></i>
			            	</a>				
	   
	                      	<a href="#" class="btn btn-danger" data-target="#modal-delete-{{$producto->id}}" data-toggle="modal">
							  <i class="fa fa-trash"></i>
						 	</a>		  
	                        @include('adminlte::productos.modal-eliminar')
	                    </td>
	                </tr>      
			      @endforeach	    
		    </tbody>
		  </table> 
	    </div> 
	     @else   

		    <div class="callout callout-warning">
               <h4><i class="icon fa fa-warning"></i>
                Importante!!
               </h4>
               <p>Al parecer no cuenta con ningun Producto, por favor empiece agregando una.</p>
            </div>
	            
	         @endif            
	  </div>
	</div>
@endsection

@section('script')
   <script src="{{asset('../js/closealert.js')}}" type="text/javascript"></script>

   <script>
	$(document).ready( function () {
    $('#producto').DataTable
    ({
	    	 "language": {
                   "url": "{{asset('../js/Spanish.json')}}"
                          }
	      });  ;
} );
</script>
 
@endsection


