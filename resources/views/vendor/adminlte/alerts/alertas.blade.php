 <!--CRUD PRODUCTO-->
	 @if(Session::has('Agregado'))
		<div class="alert alert-success">
			<i class="glyphicon glyphicon-saved"></i> 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
		    {{Session::get('Agregado')}}
		</div>
	@endif

	@if(Session::has('Actualizada')) 
		<div class="alert alert-warning">
			<i class="glyphicon glyphicon-thumbs-up"></i> 
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    {{Session::get('Actualizada')}}
		</div>
	@endif

	@if(Session::has('Eliminada')) 
		<div class="alert alert-info ">
			<i class="glyphicon glyphicon-ok"></i>	
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
		    {{Session::get('Eliminada')}}
		</div>
	@endif
<!--FIN-->

 <!--CRUD PROVEEDORES-->
	@if(Session::has('proveedorSt')) 
		<div class="alert alert-success">
			<i class="glyphicon glyphicon-saved"></i> 
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		    {{Session::get('proveedorSt')}}
		</div>
	@endif

	@if(Session::has('provedorUp')) 
		<div class="alert alert-warning">
			<i class="glyphicon glyphicon-thumbs-up"></i> 
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		     {{Session::get('provedorUp')}}
		</div>
	@endif

	@if(Session::has('proveedorDE')) 
		<div class="alert alert-info">
			<i class="glyphicon glyphicon-ok"></i>	
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		     {{Session::get('proveedorDE')}}
		</div>
	@endif
<!--FIN-->

 <!--CRUD CATEGORIA-->
	 @if(Session::has('creadacat')) 
			<div class="alert alert-success">
				<i class="glyphicon glyphicon-saved"></i>
				<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{Session::get('creadacat')}}
		</div>
	  @endif

	  @if(Session::has('CatActualizada'))
	    <div class="alert alert-warning">
	    	<i class="glyphicon glyphicon-saved"></i>
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    	{{Session::get('CatActualizada')}}
	    </div>
	  @endif

	  @if(Session::has('Cateliminada')) 
		<div class="alert alert-info">
			<i class="glyphicon glyphicon-ok"></i>	
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		     {{Session::get('Cateliminada')}}
		</div>
	 @endif



 <!--FIN-->