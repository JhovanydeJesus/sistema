@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Agregar_Producto') }}
@endsection

@section('contentheader_title')
  	
	 <a href="{{url('productos')}}" class="btn btn-danger " >
		 <i class='fa fa-arrow-circle-left'></i>
		 Regresar 
	</a>  

	<a href="{{url('productos')}}" class="btn btn-success" >
		 <i class='glyphicon glyphicon-plus'></i>
		Nueva Categoria 
	</a>	
   
		
@endsection


@section('main-content')
     
     <div class="callout callout-info" >
		<button type="button" class="close" aria-label="Close" onclick="$(this).parents('div').first().fadeOut()">
				<span aria-hidden="true">&times;</span></button>
       <i class="fa fa-warning"></i> <strong>Nota:</strong>
        Si no encuentra la categoría del producto, agregue uno por favor
     </div> 

    <div class="panel panel-primary">
     	<div class="panel-heading ">
     		<h3 class="panel-title">
     		  <li class="glyphicon glyphicon-plus"></li>
     		  Agregar Nuevo
     		</h3>

     	</div>

     	<div class="panel-body">
			{!! Form::open(['route'=>'productos.store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
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

					       	<!--<div class="form-group required has-feedback">
					       		{!! Form::label('Stock:') !!}
					       	 	{!! Form::text('stock',null,['class'=>'form-control','placeholder'=>'Stock']) !!}
					       	 	<span class="glyphicon glyphicon-equalizer form-control-feedback"></span>
					       	</div>-->
				        </div>

				        <div class="col-sm-6 col-md-6 col-lg-6 ">
					       	<div class="form-group required {{ $errors->has('id_categoria') ? ' has-error' : '' }}">
					       		<label for="text"><strong>Categoría:</strong></label>
						       	    <select class="categoria form-control" name="id_categoria" >
						       	    	    <option disabled selected>Seleccione una categoría por favor</option>
											@foreach($categoria as $cat)
												<option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
											@endforeach
											
									</select>
									@if ($errors->has('id_categoria'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('id_categoria') }}</strong>
			                                    </span>
                                          @endif
					       	</div>

			               <!-- <div class="form-group has-feedback">
						       		{!! Form::label('Precio de venta') !!}
						       	 	{!! Form::text('p_venta',00.00,['class'=>'form-control','placeholder'=>'Precio de venta',' disabled ']) !!}
						       	 	<span class="glyphicon glyphicon-usd form-control-feedback"></span>	       	 	
						    </div>-->

					        <div class="form-group has-feedback {{ $errors->has('imagen') ? ' has-error' : '' }}">
					        	<label for="text"><strong>Imagen:</strong></label>
					        	<input type="file" name="imagen" placeholder=""  value="{{ old('imagen') }}" class="form-control" >
					       	 	<span class="glyphicon glyphicon-picture form-control-feedback"></span>
					       	 	@if ($errors->has('imagen'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('imagen') }}</strong>
	                                    </span>
                                 @endif
					        </div>
				       </div>			
		    		</div>
		               
		    		<div class="box-footer">
						
					   <button type="submit" class="btn bg-olive pull-right" >
						   <li class=" glyphicon glyphicon-floppy-disk"></li>
						   Guardar
					   </button>

					   <button type="reset" class="btn bg-orange pull-right" style="margin-right: 5px;">
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
$(".categoria").select2({
    width: 'resolve', // need to override the changed default
     placeholder: "Seleccione una categoria por favor",
      allowClear: true
});
	
</script>
@endsection