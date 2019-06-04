@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Editar_Producto') }}
@endsection

@section('contentheader_title')
<a href="{{url('productos')}}" class="btn btn-danger">
			    	     	      <i class='fa fa-arrow-circle-left'></i>
			    	     	      Regresar 
						</a>
		
@endsection


@section('main-content')
 
  	<div class="panel panel-primary">
	  <div class="panel-heading ">
	   <h3 class="panel-title">
	   	<li class="glyphicon glyphicon-edit"></li>
	      Editar
	    </h3>
	  </div>
	  <div class="panel-body">
		     {!! Form::model($producto,['route'=>['productos.update',$producto->id],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
		     {!! Form::token() !!}
                <div class="box box-info">
                	<div class="box-header with-border">
                		<h4>Producto</h4>
                	</div>

                	<div class="box-body">
                		<div class="col-md-6">


					        <div class="form-group required has-feedback {{ $errors->has('clave') ? ' has-error' : '' }}">
					       	 	<label for="text"><strong>Clave:</strong></label>
					       	 	{!! Form::text('clave',null,
					       	 		[
					       	 		 'class'=>'form-control',
					       	 		 'placeholder'=>'Clave',
					       	 		 old('clave')]) !!}
					       	 	<span class="glyphicon glyphicon-barcode form-control-feedback"></span>
					       	 	@if ($errors->has('clave'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('clave') }}</strong>
	                                    </span>
                                 @endif
					       	</div>

					       	<div class="form-group required has-feedback {{ $errors->has('descripcion') ? ' has-error' : '' }}">
				              <label for="text"><strong>Descripción:</strong></label>
					       	 	{!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción']) !!}
					       	 	<span class="glyphicon glyphicon-tag form-control-feedback"></span>
					       	 	@if ($errors->has('descripcion'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('descripcion') }}</strong>
	                                    </span>
                                 @endif

					       	</div>     

					       	<div class="form-group required has-feedback">
					       		<label for="text"><strong>Stock:</strong></label>
					       	 	{!! Form::text('stock',null,['class'=>'form-control','placeholder'=>'Stock','required','disabled']) !!}
					       	 	<span class="glyphicon glyphicon-equalizer form-control-feedback"></span>
					       	</div>
				        </div>

				        <div class="col-md-6">


				       		<div class="form-group required">
				       		<label for="text"><strong>Categoría:</strong></label> 
					       	   <select name="id_categoria" class="js-example-basic-single  form-control" id="id_label_single" data-live-search="true">
	                                  @foreach($categorias as $cat)
	                                   @if($cat->id==$producto->id_categoria)
	                                     <option value="{{ $cat->id}}" selected>{{ $cat->nombre }}</option>
	                                   @else
	                                    <option value="{{ $cat->id}}">{{ $cat->nombre }}</option>
	                                   @endif
	                                  @endforeach
								</select>
				       	    </div>

						    <div class="form-group has-feedback">
						       		<label for="text"><strong>Precio de Venta:</strong></label> 
						       	 	{!! Form::text('p_venta',null,['class'=>'form-control','placeholder'=>'Precio de venta']) !!}
						       	 	<span class="glyphicon glyphicon-usd form-control-feedback"></span>

						    </div>


					        <div class="form-group has-feedback">
					       		<label for="text"><strong>Imagen:</strong></label>
					       	 	{!! Form::file('imagen', ['class'=>'form-control']) !!}
					  	        @if(($producto->imagen) != "")
						          <img src="{{asset($producto->imagen)}}" alt="{{$producto->descripcion }}" height="80" width="80" class="img-thumbnail">
						        @else
			                      <img src="" alt="{{ $producto->descripcion }}" height="80" width="80" class="img-thumbnail">
						        @endif
                                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
					        </div>
		               </div>
                	</div>

                	<div class="box-footer">
                		
						    
					   <button type="submit" class="btn bg-olive pull-right" >
							   <li class="glyphicon glyphicon-refresh"></li>
							   Actualizar
					   </button>


					   <button type="reset" class="btn bg-orange pull-right " style="margin-right: 5px;">
					   	 <li class="glyphicon glyphicon-erase"></li>
					     Limpiar
					   </button>
                		
                	</div>
                	
               </div>
		     {!! Form::close() !!}
	    </div>
    </div>
    
@endsection

@section('script')
<script>
$(".js-example-basic-single").select2({
    width: 'resolve', // need to override the changed default
    placeholder: "Seleccione una categoria por favor",
    allowClear: true
});
	
</script>

@endsection