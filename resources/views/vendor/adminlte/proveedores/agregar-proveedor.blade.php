@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Agregar_Proveedor') }}
@endsection

@section('contentheader_title')
		<a href="{{url('proveedores')}}" class="btn btn-danger">
			    	     	      <i class='fa fa-arrow-circle-left'></i>
			    	     	      Regresar 
						    </a>
@endsection


@section('main-content')
 
  	<div class="panel panel-primary">
	  <div class="panel-heading ">
	   <h3 class="panel-title">
	   	 <li class="glyphicon glyphicon-plus"></li>
	     Agregar Nuevo
	   </h3>
	  </div>
	    <div class="panel-body">
	    	<div class="box box-info">
	    		 <div class="box-header with-border">
	    		 	<h4>Proveedor</h4>	
	    	     </div>
    	      	{!! Form::open(['route'=>'proveedores.store','method'=>'POST']) !!}
	            {!! Form::token() !!}
	            
		    	     <div class="box-body">
					       <div class="col-md-6">
						         <div class="form-group has-feedback required {{ $errors->has('nombre') ? ' has-error' : '' }}">
						       	 	<label><strong>Nombre:</strong></label>
						       	 	{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del Proveedor']) !!}
						       	 	<span class="fa fa-truck form-control-feedback"></span>
						       	 	@if ($errors->has('nombre'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('nombre') }}</strong>
	                                    </span>
                                    @endif
						       	</div>

						       	<div class="form-group has-feedback required {{ $errors->has('ciudad') ? ' has-error' : '' }}">
						       		<label><strong>Ciudad:</strong></label>
						       	 	{!! Form::text('ciudad',null,['class'=>'form-control','placeholder'=>'Ciudad de origen']) !!}
						       	 	<span class="fa fa-building form-control-feedback"></span>
						       	 	@if ($errors->has('ciudad'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('ciudad') }}</strong>
	                                    </span>
                                    @endif
						       	 </div>

						       	 <div class="form-group has-feedback required {{ $errors->has('direccion') ? ' has-error' : '' }}">
						       	 	<label><strong>Dirección:</strong></label>
						       	 	{!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección']) !!}
						       	 	<span class="fa fa-street-view form-control-feedback"></span>
						       	 	@if ($errors->has('direccion'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('direccion') }}</strong>
	                                    </span>
                                    @endif
						       	</div>
					       </div>

					       <div class="col-md-6">
					       	    <div class="form-group has-feedback required {{ $errors->has('cod_post') ? ' has-error' : '' }}">
					       	     	<label><strong>Código postal:</strong></label>
						       	 	{!! Form::text('cod_post',null,['class'=>'form-control','placeholder'=>'Código postal']) !!}
						       	 	<span class="fa fa-envelope form-control-feedback"></span>
						       	 	@if ($errors->has('cod_post'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('cod_post') }}</strong>
	                                    </span>
                                    @endif
						       	</div>

						       	<div class="form-group required has-feedback {{ $errors->has('telefono') ? ' has-error' : '' }}">
						       		<label><strong>Teléfono:</strong></label>
						       	 	{!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Teléfono']) !!}
						       	 	<span class="fa  fa-phone form-control-feedback"></span>
						       	 	@if ($errors->has('telefono'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('telefono') }}</strong>
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

	    		 {!! Form::close() !!}	
	        </div>      		  
		</div>
	</div>
    
@endsection