@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Proveedores') }}
@endsection

@section('contentheader_title')
		<a href="{{url('proveedores/create')}}" class="btn bg-olive" role="button">
	      <li class="glyphicon glyphicon-plus"></li>
		 Agregar Nuevo
	    </a> 
@endsection


@section('main-content')
  @include('adminlte::alerts.alertas')
	<div class="panel panel-primary">
	  <div class="panel-heading">
	  	<h3 class="panel-title">
	  	   <li class="fa fa-users"></li>
	  	  Catalogo Proveedores
	  	</h3>
	  </div>
	  <div class="panel-body">
	  	 @if(sizeof($proveedores)>0)
	    <div class="table-responsive">
		  <table id="proveedores" class="table table-hover">
			  <thead>
			        <tr>
			            <th>Nombre</th>
			            <th>Ciudad</th>
			            <th>Direccección</th>
			            <th>Código postal</th>
			            <th>Teléfono </th>
			            <th>Estado</th>
			            <th>Acciones</th>
			        </tr>
			   </thead>
			    
			   <tbody>
			    	
				      @foreach ($proveedores as $proveedor)
				        <tr>
		                    <td>{{$proveedor->nombre}}</td>
		                    <td>{{$proveedor->ciudad}}</td>
		                    <td>{{$proveedor->direccion}}</td>
				            <td>{{$proveedor->cod_post}}</td>
				            <td>{{$proveedor->telefono}}</td>
				            @if($proveedor->estado=='Activo')
				            <td><span class="badge bg-teal">{{$proveedor->estado}}</span></td>
				            @else
				            <td><span class="badge">{{$proveedor->estado}}</span></td>
				            @endif
				            <td>
				            	<a href="proveedores/{{$proveedor->id}}/edit" class="btn btn-warning">
				                  <i class="fa fa-edit"></i>
				                </a>

				                <a href="#" data-target="#modal-delete-{{$proveedor->id}}" data-toggle="modal">
								 <button class="btn btn-danger">
								 <li class="fa fa-trash"></li>
								</button>
						 	    </a>		  
	                            @include('adminlte::proveedores.modal-eliminar')
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
               <p>Al parecer no cuenta con ningun Proveedor, por favor empiece agregando una.</p>
            </div> 
         @endif        
	  </div>
	</div>
@endsection

@section('script')
   <script src="{{asset('../js/closealert.js')}}" type="text/javascript"></script>

  <script type="text/javascript" >
  $(document).ready( function () {
        $('#proveedores').DataTable
          ({
           "language": {
                     "url": "{{asset('../js/Spanish.json')}}"
                            }
          });           
       });
  </script>
@endsection



