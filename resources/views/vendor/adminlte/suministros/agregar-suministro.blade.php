@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Agregar_Suministro') }}
@endsection

@section('contentheader_title')
     <a href="{{url('suministros')}}" class="btn btn-danger ">
		<i class='fa fa-arrow-circle-left'></i>
	      Regresar 
	    </a>

	     <!-- Button to trigger modal -->
		<button class="btn bg-olive " data-toggle="modal" data-target="#modalForm">
		    Nuevo Producto
		</button>
@endsection


@section('main-content')

@include('adminlte::suministros.Modal-producto')

   {!! Form::open(['route'=>'suministros.store', 'method'=>'POST']) !!}
    {!! Form::token() !!}
   	<div class="box box-info">
  	  <div class="box-header with-border bg-blue">
  	
  	  	<li class="glyphicon glyphicon-plus"></li>
  	  Nuevo Suministro
  	
  	  </div>
  	  <div class="box-body">
  	  	<div class="row">
	  	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  	  	<div class="form-group">
		   		<label for=""><strong>Seleccione Provedor:</strong></label>
		   		 <select class="select2 form-control" name="id_proveedor" id="proveedor"style="width: 100%;" >
			    	    <option disabled selected>-Seleccione Proveedor por favor-</option>
			    	    @foreach($proveedores as $provee)
			    	      <option value="{{$provee->id}}">{{$provee->nombre}}</option>}
			    	      
			    	    @endforeach
				</select>
	     	</div>
	  	  </div>

           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           	<div class="panel panel-danger">
              <div class="panel-body">
	              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			  	  	<div class="form-group">
				   		<label for=""><strong>Seleccione Producto:</strong></label>
 
				   		 <select class="select2 form-control" name="id_producto" id="producto" style="width: 100%;" tabindex="-1"required>
				   		 	 <option disabled selected>-Seleccione Producto por favor-</option>
					    	    @foreach($productos as $prod)
					    	     <option value="{{$prod->id}}">{{$prod->producto}}</option>
					    	     @endforeach
						</select>
			     	</div>
			  	  </div>

			  	   <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			  	  	<div class="form-group has-feedback">
				   		{!! Form::label('Cantidad Producto:', []) !!}
				   		<input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese datos mayores a 0"  >
				   		<span class="fa fa-stack-overflow form-control-feedback"></span>
			     	</div>
			  	  </div>

			  	  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			  	  	<div class="form-group has-feedback">
			  	  		{!! Form::label('Precio de Compra:', []) !!}
				   		<input type="number" name="p_compra" id="p_compra" class="form-control" placeholder="Ingrese datos mayores a 0" >
				   		<span class="glyphicon glyphicon-usd form-control-feedback"></span>	  
			     	</div>
			  	  </div>

			  	  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			  	  	<div class="form-group has-feedback">
				   		{!! Form::label('Porcentaje de venta:', []) !!}
				   		<input type="number" name="porcentaje_venta" id="porcentaje_venta" class="form-control"  placeholder="Ingrese datos mayores a 0">
				   			<span class="fa fa-balance-scale form-control-feedback"></span>
			     	</div>
			  	  </div>

			  	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			  	  	<div class="form-group">		       
		                <button type="button" id="agregar" class="btn bg-purple btn-block">
			                 <i class='fa fa-cart-plus'></i> 
			                Agregar
		               </button>
			     	</div>
			  	  </div>

              </div>
           	</div>
           </div>
	  	   

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	  	   <div class="panel panel-primary">
	  	  	<div class="panel-body">
	  	  	  <div class="table-responsive">
	  	  	  	<table id="carrito" class=" table table-hover">
	  	  			<thead >
	  	  				<tr>
	  	  					<th>Proveedor</th>
	  	  					<th>Producto</th>
	  	  					<th>Cantidad</th>
	  	  					<th>Precio_Compra</th>
	  	  					<th>Porcentaje de Venta</th>
	  	  					<th>Subtotal</th>
	  	  					<th>Acción</th>
	  	  				</tr>
	  	  			</thead>
	  	  			<tbody>
	  	  			</tbody>
	  	  			<tfoot>
	  	  				<tr>
	  	  					<th></th>
	  	  					<th></th>
	  	  					<th></th>
	  	  					<th></th>
	  	  					<th>TOTAL</th>
	  	  					<th id="total">$ 00.00</th>
	  	  				</tr>
	  	  			</tfoot>
	  	  		</table>
	  	  	  </div>
	  	  	</div>	
	  	   </div>
	  	  </div>

  	  	</div>	
  	  </div>
  	  <div class="box-footer" id="guardar" >

  	    <button type="submit" class="btn bg-olive pull-right">
  	    <li class=" glyphicon glyphicon-floppy-disk"></li>
  	     Guardar
  	   </button>
  	  		
  	  </div>

  	  
  	</div>
  {!! Form::close() !!}
  	
@endsection

@section('script')

<script>

    $("#modalForm").on("submit", ".modal", function(){

    $('#modalForm').modal('show');
    $('.modal').show();
    var parametros= {
        "clave" : $("#txt_clave").val(),
        "descripcion" : $("#txt_descripcion").val(),
        "categoria":$("#categoria").val(),
        "imagen":$("#txt_imagen").val(),
    };

    console.log(parametros);
    $.ajax({
        type: "POST",
        url: "productos/store",
        data: parametros,
        success: function(data) {
        },
        error: function() {
        }
    })
    return false; // Esto para evitar que envíe el formulario.
})

    

</script>

	<script>
		$(".select2").select2({
		    width: 'resolve', // need to override the changed default
		     theme: "classic"
		});
		$('select').select2({ 
		      	  width: 'resolve', // need to override the changed default
		     	  theme: "classic",   
                  language: {
                     noResults: function() 
                      {
                        return "No hay resultado"; 
                      },
                      searching: function() 
                      {
                       return "Buscando..";
                      }
                     }
               });
			
	</script>

	<script>
	$(document).ready(function(){
		$('#agregar').click(function(){
		  agregar();
		});
	});

   
	total=0
	var contador=0;
	subtotal=[];
	cantidad=0;
	p_compra=0;
	porc_venta=0;
	monto=0;
     $('#guardar').hide();
	   function agregar()
	   {
		   	idproducto=$('#producto').val();
		   	producto=$('#producto option:selected').text();
		   	cantidad=$('#cantidad').val();
		   	p_compra=$('#p_compra').val();
		   	porc_venta=$('#porcentaje_venta').val();
		   	var idproveedor = $('#proveedor').val();
 		  	proveedor=$('#proveedor option:selected').text();

 		  	if(proveedor!="-Seleccione Proveedor por favor-" && idproducto!="")
 		  	{

 		  		if (producto!="-Seleccione Producto por favor-") 
 		  		{
	 		  		if(cantidad!="" && cantidad>0 && p_compra!="" && p_compra>0 && porc_venta!="" && porc_venta>0)
				   	{

				   		subtotal[contador]=(cantidad*p_compra);
				   		total=total+subtotal[contador];

				   		var totalFilas = $('#carrito > tbody').children('tr').length;//los hijos de el id carrito que sean tbody y la cantidad de los hijos de tbody que sean tr 
		 		  		

				   		var tfila='<tr class="selected" id="fila'+contador+'"><td><input type="hidden" name="productos['+totalFilas+'][idProveedor]" value="'+idproveedor+'">'+proveedor+'</td><td><input type="hidden" name="productos['+totalFilas+'][idProducto]" value="'+idproducto+'">'+producto+'</td><td><input type="hidden" name="productos['+totalFilas+'][cantidad]" value="'+cantidad+'" >'+cantidad+'</td><td><input type="hidden" name="productos['+totalFilas+'][precioCompra]" value="'+p_compra+'" >'+p_compra+'</td><td><input type="hidden" name="productos['+totalFilas+'][porcentajeVenta]" value="'+porc_venta+'" >'+porc_venta+'</td><td><input type="hidden" name="subtotal_ob" value="'+subtotal[contador]+'" >'+subtotal[contador]+'</td><td><button type="button" class="btn btn-danger" onclick="eliminar('+contador+');"><li class="fa fa-trash"></li></button></td></tr>';
				   		    contador++;
				   		    limpiar();
				   		    $('#total').html("$"+' '+total);
				   		    verificar();
			                $('#carrito').append(tfila);
			                
			                

			            

				   	}

					   	else
					   	{
					   		$.confirm({
				               icon: 'fa fa-warning',
				               title: 'Algo salió mal',
				               content: 'Verifique que los valores de los campos no estén vacíos o en "0", y que también no sean negativos.',
								    type: 'orange',
								    typeAnimated: true,
								    buttons: {
								        
								        Cerrar: function () {
								        }
				 				    }
				                   });
					   	}

 		  	     }
 		  	     else
 		  	     {
 		  	     		$.confirm({
				               icon: 'fa fa-warning',
				               title: 'Algo salió mal',
				               content: 'Es necesario seleccionar un Producto',
								    type: 'orange',
								    typeAnimated: true,
								    buttons: {
								        
								        Cerrar: function () {
								        }
				 				    }
				                   });

 		  	     }

 		    }
	              
 		  	else
 		  	{
 		  		$.confirm({
			               icon: 'fa fa-warning',
			               title: 'Algo salió mal',
			               content: 'Es necesario seleccionar un Proveedor',
							    type: 'orange',
							    typeAnimated: true,
							    buttons: {
							        
							        Cerrar: function () {
							        }
			 				    }
			                   });

 		  	}	   	

	   }

	 
      function limpiar()
      {
      	$('#cantidad').val("");
      	$('#p_compra').val("");
      	$('#porcentaje_venta').val("");
      }

      function verificar()
      {
      	if(total>0)
      	{
      		$('#guardar').show();
      	}
      	else
      	{
      		$('#guardar').hide();
      	}
      }
     function eliminar(cont)
     {  
     	total=total-subtotal[cont];
     	 $('#total').html("$"+' '+total);
     	 $('#fila'+cont).remove();
     	 verificar();

     }
     


	</script>
@endsection
