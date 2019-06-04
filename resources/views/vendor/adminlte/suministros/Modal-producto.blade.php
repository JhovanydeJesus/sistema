<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background:#3c8dbc;" >
                <button type="button" class="close" data-dismiss="modal">
                  <span class="glyphicon glyphicon-remove-circle" style="color:#21618C  ;"></span>
                </button>
                <h4 class="modal-title" style="color:#FFFFFF;"><strong>Nuevo Producto</strong></h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <div class="box box-info">
                    <div class="box-body">
                         <form action="#" class="modal">
                             <div class="form-group required has-feedback">
                                {!! Form::label('Clave:') !!}
                                {!! Form::text('clave',null,['class'=>'form-control','placeholder'=>'Clave'],'id=txt_clave') !!}
                                <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
                            </div>
                            <div class="form-group required has-feedback">
                                {!! Form::label('Descripción:') !!}
                                {!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripción'],'id=descripcion') !!}
                                <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                            </div> 
                             <div class="form-group">
                            {!! Form::label('Categoría') !!}
                                <select class=" categoria form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" id="categoria">  
                                <?php $categoriass = DB::table('categorias')->get(); ?> 
                                <option disabled selected>-Seleccione Categoría por favor-</option>
                                    option    
                                            @foreach($categoriass as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                            @endforeach
                                    </select>
                             </div>


                            <div class="form-group required has-feedback">
                                {!! Form::label('Imagen:') !!}
                                {!! Form::file('imagen', ['class'=>'form-control','required'],'id=imagen') !!}
                                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                            </div>
                             
                 </div>  
             </div>  
        </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                 <button type="submit" id="guardar" class="btn bg-olive pull-right" >
                           <li class=" glyphicon glyphicon-floppy-disk"></li>
                           Guardar
                </button>

             
               <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right: 5px;">Cerrar</button>
            </div>

            </form>
        </div>
    </div>
</div>




