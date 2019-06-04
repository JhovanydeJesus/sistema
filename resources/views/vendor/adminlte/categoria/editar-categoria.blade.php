
<div class="modal fade " id="modal-edit-{{$cat->id}}">
  {!! Form::open(['route'=>['categorias.update',$cat->id ],'method'=>'PUT']) !!}
  {!! Form::token() !!}
    <div class="modal-dialog" data-backdrop=”static” data-keyboard=”false”>
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background:#3c8dbc;">
                <button type="button" class="close" data-dismiss="modal">
                  <span class="glyphicon glyphicon-remove-circle" style="color:#21618C  ;"></span>
                </button>
                <h4 class="modal-title" style="color:#FFFFFF;"><strong>Editar Categoría</strong></h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                  <div class="box box-info">
                    <div class="box-body">

                           
                     <div class="form-group has-feedback {{ $errors->has('nombre') ? ' has-error' : '' }}">
                          <label><strong>Nombre:</strong></label>
                          {!! Form::text('nombre',$cat->nombre, ['class'=>'form-control','placeholder'=>'Inserte el nombre de la categoría']) !!}
                         <span class="glyphicon glyphicon-pencil form-control-feedback"></span> 
                           @if ($errors->has('nombre'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                          @endif        
                      </div>  
                      
                    </div>
                    
                  </div>
                  
                   
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                 <button type="submit" class="btn bg-olive pull-right" >
                           <li class=" glyphicon glyphicon-refresh"></li>
                           Actualizar
                       </button>

             
               <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right: 5px;">
               Cerrar</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!} 
</div>



                  
                    
                    
               
                    
