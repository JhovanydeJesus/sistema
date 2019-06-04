@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Categorias') }}
@endsection

@section('contentheader_title')		
@endsection


@section('main-content')

	<div class="container">
	      @include('adminlte::categoria.nueva-categoria')
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				@include('adminlte::alerts.alertas')
				<div class="panel panel-primary">
					<div class="panel-heading">
					   <h3 class="panel-title">
					      <li class="glyphicon glyphicon-list-alt"></li>
					       Categoría Productos
					    </h3>
					</div>
					<div class="panel-body">
					  @if(sizeof($categorias)>0)
						<div class="row">
						  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<table id="categoria" class="table table-hover">
								 <thead>
									<tr>
										<th>Categoría</th>
										<th>Estado</th>
										<th>Acciones</th>
										
										
										
									</tr>
								 </thead>
								 <tbody>
								   @foreach($categorias as $cat)
									 <tr>
							            <td>{{$cat->nombre}}</td>
							            @if($cat->estado==1)
							            <td><span class="badge bg-teal">Activo</span></td>
							            @else
							            <td><span class="badge ">Elimanada</span></td>
							            @endif
							            <td> 
							            	<a href="#" class="btn btn-warning" data-target="#modal-edit-{{$cat->id}}" data-toggle="modal">
							            	 <i class="fa fa-pencil-square-o"></i>
							            	 |
							            	 Editar
							                </a>  
							                 @include('adminlte::categoria.editar-categoria')  
							                <a href="#" class="btn btn-danger" data-target="#modal-eliminar-{{$cat->id}}" data-toggle="modal">
							               	<i class="fa fa-trash"></i>
							               	|
							               	Eliminar
							                </a> 	
							                 @include('adminlte::categoria.eliminar-categoria')
						           		</td>
									 </tr>
								   @endforeach
								</tbody>
							</table>
						  </div>			
					    </div>			
					  @else
						<div class="callout callout-warning">
                           <h4><i class="icon fa fa-warning"></i>
                            Importante!!
                           </h4>
                           <p>Al parecer no cuenta con ninguna categoría, por favor empiece agregando una.</p>
                        </div>
                      @endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
    
@section('script')
   <script>
		$(document).ready( function () {
	    $('#categoria').DataTable
	      ({
	    	 "language": {
                   "url": "{{asset('../js/Spanish.json')}}"
                          }
	      });           
	   });
   </script>
   <script src="{{asset('../js/closealert.js')}}" type="text/javascript"></script>
   <script src="{{asset('../js/categoria.js')}}" type="text/javascript"></script>
   <script src="{{asset('../js/btndesactivado.js')}}" type="text/javascript"></script>   
@endsection
