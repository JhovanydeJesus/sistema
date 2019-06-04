<div class="modal fade " id="modal-delete-{{$proveedor->id}}">
  {!! Form::open(['route'=>['proveedores.destroy',$proveedor->id ],'method'=>'DELETE']) !!}
	<div class="modal-dialog" id>
		<div class="modal-content">
			<div class="modal-header" style="background:#CD6155;">
				<button type="button" class="close" data-dismiss="modal">
					<span class="glyphicon glyphicon-remove-circle" style="color:#FFFFFF;"></span>
				</button>
				<h4 class="modal-title" style="color:#FFFFFF;"><strong>Eliminar Proveedor</strong></h4>
			</div>
			<div class="modal-body ">
				<p>
					<li class="glyphicon glyphicon-warning-sign fa-lg" style="color:#F5B109;"></li>
					Confirme si desea Eliminar <strong>{{ $proveedor->nombre }}</strong>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				<button type="submit" class="btn btn-primary">Cofirmar</button>
			</div>
         </div>
     </div>
  {!! Form::close() !!} 		
</div>