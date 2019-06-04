<div class="row">
		<div class="col-md-9 col-md-offset-1">	
      
			<div class="box box-info">
	    		 <div class="box-header with-border"></div>
	    	     {!! Form::open(['route'=>'categorias.store','method'=>'POST']) !!} 
               <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">	
  	    	    <div class="box-body">
  	    	     	<div class="col-md-12">
    	           	 
    	           	     	<div class="col-md-3">
    	           	     	  <label><strong>Nueva Categoría:</strong></label>
    	           	     	</div>


    	           	     	<div class="col-md-7">
                          <div class="form-group has-feedback {{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
    	           	     	     {!! Form::text('nombre',null, ['id'=>'nombre','class'=>'form-control','placeholder'=>'Inserte el nombre de la categoría']) !!}
                              @if ($errors->has('nombre'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('nombre') }}</strong>
                                      </span>
                              @endif
                          </div>
    	           	     	</div>
                        
    	           	     	<div class="col-md-2">
                          {!! Form::submit('Agregar', ['class'=>'btn btn-primary']) !!}
                          <!--{!!link_to('#',$tittle='Agregar',$attributes=['id'=>'agregar', 'class'=>'btn btn-primary'],$secure=null)!!}-->
    	           	     	</div>
                 </div> 		 	
  	    	     </div>
            </div>  
	    	 {!! Form::close() !!} 
		</div>		
</div>