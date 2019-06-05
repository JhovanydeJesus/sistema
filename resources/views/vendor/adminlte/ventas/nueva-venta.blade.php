@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Punto de Venta') }}
@endsection

@section('contentheader_title')
     <a href="{{url('suministros')}}" class="btn bg-orange ">
		<i class='fa fa-arrow-circle-left'></i>
	      Regresar 
	    </a>    		
@endsection


@section('main-content')
  
   {!! Form::open(['route'=>'ventas.store', 'method'=>'POST']) !!}
    {!! Form::token() !!}
   	<div class="box box-info">
  	  <div class="box-header with-border bg-blue">
  	
  	  	<li class="glyphicon glyphicon-plus"></li>
  	   Punto de Venta
  	
  	  </div>
  	  <div class="box-body">
  	  	<div class="row">
	  	  

           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           	<div class="panel panel-danger">
              <div class="panel-body">
	              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			  	  	<div class="form-group">
				   		<label for=""><strong>Seleccione Producto a Vender:</strong></label>
				   		 <select class="select2 form-control" name="id_producto" id="producto" required>
				   		 	<option disabled selected>-Seleccione el producto por favor-</option>
					    	    @foreach($productos as $prod)
					    	     <option data-id="{{$prod->id}}" value="{{$prod->id}}_{{$prod->stock}}_{{$prod->p_venta}}">{{$prod->producto}}</option>
					    	     @endforeach
						</select>
			     	</div>
			  	  </div>

			  	   <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			  	  	<div class="form-group has-feedback">
				   		{!! Form::label('Cantidad Producto a vender:', []) !!}
				   		<input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese datos mayores a 0"  >
				   		<span class="fa fa-stack-overflow form-control-feedback"></span>
			     	</div>
			  	  </div>

			  	  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			  	  	<div class="form-group has-feedback">
			  	  		{!! Form::label('Precio de Venta:', []) !!}
				   		<input type="number" name="p_venta" id="p_venta" class="form-control" disabled>
				   		<span class="glyphicon glyphicon-usd form-control-feedback"></span>	  
			     	</div>
			  	  </div>

			  	  <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			  	  	<div class="form-group has-feedback">
				   		{!! Form::label('Stock:', []) !!}
				   		<input type="number" name="stock" id="stock" class="form-control" disabled>
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
	  	  					<th>Producto</th>
	  	  					<th>Cantidad</th>
	  	  					<th>Precio Venta</th>
	  	  					<th>Subtotal</th>
	  	  					<th>Acción</th>
	  	  				</tr>
	  	  			</thead>
	  	  			<tbody>
	  	  			</tbody>
	  	  			
	  	  		</table>
	  	  	  </div>
	  	  	</div>	
	  	   </div>
	  	  </div>

  	  	
  	  	 <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 pull-right">
	  	   <div class="panel panel-info">
	  	   	<div class="panel-heading">Cobrar</div>
	  	  	<div class="panel-body">
	  	  	  <div class="table-responsive">
	  	  	  	<table id="caja" class=" table table-striped">
	  	  			<thead >
	  	  				<tr>
	  	  					<th>Total</th>
	  	  					<th>Pago con</th>
	  	  					<th>Cambio</th>
	  	  					
	  	  				</tr>
	  	  			</thead>
	  	  			<tbody>
	  	  			<th id="total">$ 00.00</th>
	  	  			</tbody>
	  	  			<tfoot>
	  	  				<tr>
	  	  					<th></th>
	  	  					<th></th>
	  	  					<th id="cobrar"><button type="button" class="btn btn-primary">Cobrar</button></th>
	  	  					
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
		$(".select2").select2({
		    width: 'resolve', 
		     theme: "classic"
		});
		$('select').select2({ 
		      	  width: 'resolve',
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
  
 <script type="text/javascript">
 	$(document).ready(function(){
  		$('#agregar').click(function(){

  			
  				agregar();
  		
		});
  	});
    
    $('#producto').change(valores);
    $('#guardar').hide();
    $('#cobrar').hide();
  	total=0;
  	var contador=parseInt(0);
  	subtotal=[];
    cantidad=0;
    p_venta=0;
    stock=0;
   

  	function valores()
  	{
  		valores=document.getElementById('producto').value.split('_');
  		$('#stock').val(valores[1]);
  		$('#p_venta').val(valores[2]);
  	}

  	 function agregar()
	   {
	   		var producto = $('#producto option:selected');
	   	    var valores = producto.val().split('_');
		   	var idproducto = valores[0];
		   	var stock=parseInt(valores[1]);
		   	var p_venta=parseInt(valores[2]);
		   
		   	//Comprueba si ya está agregado el producto
		   	var esProductoAgregado = $("#carrito > tbody").find("[data-id='"+producto.attr('data-id')+"']").length == 0 ? false : true;

		    var cantidad=parseInt($('#cantidad').val());


		   	 	subtotal[contador]=(cantidad*p_venta);
				total=total+subtotal[contador];
				var totalFilas = $('#carrito > tbody').children('tr').length;

 			if (idproducto!="-Seleccione el producto por favor-" && idproducto!="") 
 			{
 				if ( cantidad!="" &&cantidad>0) 
 				{
			 		if(cantidad<=stock && !esProductoAgregado)
					   {  
                            
	                       
	                       		var tfila='<tr class="selected" data-id="'+idproducto+'" id="fila'+contador+'"><td><input type="hidden" name="productos['+totalFilas+'][idProducto]" value="'+idproducto+'">'+producto.text()+'</td><td name="tdCantidad"><input type="hidden" name="productos['+totalFilas+'][cantidad]" value="'+cantidad+'" id="cantidadc">'+cantidad+'</td><td><input type="hidden" name="productos['+totalFilas+'][P_Venta]" value="'+p_venta+'" >'+p_venta+'</td><td name="tdSubtotal"><input type="hidden" name="subtotal_ob" value="'+subtotal[contador]+'" id="subtotals">'+subtotal[contador]+'</td><td><button type="button" class="btn btn-danger" onclick="eliminar('+contador+');"><li class="fa fa-trash"></li></button></td></tr>';
	                       		    contador++;
								    limpiar();
								    $('#total').html("$"+' '+total);
							        verificar();
							        //$('#stock').val(stock-cantidad);
							        $('#carrito').append(tfila);
							        stock -= cantidad;
							        producto.val(idproducto+"_"+stock+"_"+p_venta);

					   }
					   else if(cantidad<=stock && esProductoAgregado){
					   	    stock -= cantidad;
					   		//Actualiza el atributo valor del option seleccionado
					   		producto.val(idproducto+"_"+stock+"_"+p_venta);
					   		//Actualiza los campos en la fila
					   		var fila = $("#carrito > tbody").find("[data-id='"+producto.attr('data-id')+"']").first('tr');
					   		//Actualiza td Cantidad
					   		var cantidadAnterior = fila.find("[name='tdCantidad']").find("input").first().val();
					   		var posicionCantidad = fila.find("[name='tdCantidad']").find("input").first().attr("name");

					   		fila.find("[name='tdCantidad']").html(
					   			'<td name="tdCantidad"><input type="hidden" name="'+posicionCantidad+'" value="'+ (parseInt(cantidadAnterior) + parseInt(cantidad))+'" id="cantidadc">'+ (parseInt(cantidadAnterior) + parseInt(cantidad))+'</td>');

					   		var SubtotalAnterior = fila.find("[name='tdSubtotal']").find("input").first().val();
					   		var pocisionSubtotal = fila.find("[name='tdSubtotal']").find("input").first().attr("name");
					   		var nuevoSubtotal = parseInt(SubtotalAnterior) + (cantidad*p_venta);

					   		fila.find("[name='tdSubtotal']").html(
					   			'<td name="tdSubtotal"><input type="hidden" name="'+pocisionSubtotal+'" value="'+ nuevoSubtotal+'" id="subtotals">'+nuevoSubtotal+'</td>');

                             limpiar();
                             $('#total').html("$"+' '+total);
							 verificar();
							


					   }
					   else
					   {
					   		$.confirm({
				               icon: 'fa fa-warning',
				               title: 'Algo salió mal',
				               content: 'La cantidad que desea vender ya supero al stock del producto',
								    type: 'orange',
								    typeAnimated: true,
								    buttons: {
								        
								        Cerrar: function () {
								        }
				 				    }
				                   });
					   	
					   }

					   $('#stock').val(stock);

 				}else
 				{
                  $.confirm({
	               icon: 'fa fa-warning',
	               title: 'Algo salió mal',
	               content: 'Verifique que el valor del campo cantidad no este vacío o en "0", y que también no sea negativo.',
					    type: 'orange',
					    typeAnimated: true,
					    buttons: {
					        
					        Cerrar: function () {
					        }
	 				    }
	                   });
 				}
 			}else
 		    {
 		    	$.confirm({
	               icon: 'fa fa-warning',
	               title: 'Algo salió mal',
	               content: 'Es necesario que elija un producto. ',
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
      }

      function verificar()
      {
      	if(total>0)
      	{
      		$('#guardar').show();
      		$('#cobrar').show();
      	}
      	else
      	{
      		$('#guardar').hide();
      		$('#cobrar').hide();

      	}
      }

     function eliminar(cont,r)
     {  
   		var idProducto = $('#fila'+cont).attr('data-id');
   		var producto = $('#producto').find("[data-id='"+idProducto+"']").first();
   	    var valores = producto.val().split('_');
	   	var stock=parseInt(valores[1]);
	   	var p_venta=parseInt(valores[2]);
   		var fila = $("#carrito > tbody").find("[data-id='"+idProducto+"']").first('tr');
   		var cantidadABorrar = fila.find("[name='tdCantidad']").find("input").first().val();
	   	stock += parseInt(cantidadABorrar);
	   	producto.val(idProducto+"_"+stock+"_"+p_venta);

	   	if($('#producto option:selected').attr('data-id') == idProducto){
	   		$('#stock').val(stock);
	   	}
	   	var subtotal = parseInt(fila.find("[name='tdSubtotal']").first().find("input").first().val());

		total=total-subtotal;
		//console.log(stockm)
		//cant=$('#cantidadc').val();
		//$('#stock').val(r+cant);
		$('#total').html("$"+' '+total);
		fila.remove();

     	 verificar();
     }
                  

 </script>
@endsection
