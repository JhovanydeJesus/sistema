@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Suministros') }}
@endsection

@section('contentheader_title')
   <a href="{{url('suministros/create')}}" title=""><button type="button" class="btn bg-olive">
    	 <li class="glyphicon glyphicon-plus"></li>
			Nuevo Suministro
	</button></a>
	
@endsection


@section('main-content')


   <div class="panel panel-primary">
       <div class="panel-heading">
          <h4 class="panel-title">
            <li class="fa fa-truck"></li>
          Suministros
          </h4>
       </div>
       <div class="panel-body">
        @if(sizeof($suministros)>0)
         <div class="table-responsive">
            <table  id="suministros" class="table table-hover">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Fecha del Suministro</th>
                        <th>Proveedor</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($suministros as $sumi)
                    <tr>
                        <td>{{$sumi->id}}</td>
                        <td>{{$sumi->fecha}}</td>
                        <td>{{$sumi->nombre}}</td>
                        <td>{{$sumi->total}}</td>
                         @if($sumi->estado=='Activo')
                          <td><span class="badge bg-teal">{{$sumi->estado}}</span></td>
                        @else
                          <td><span class="badge bg-red">{{$sumi->estado}}</span></td>
                        @endif
                        <td>       
                            <a href="suministros/{{$sumi->id}}" class="btn btn-primary" role="button">
                             <li class="glyphicon glyphicon-eye-open"></li></a>
                            <a href="" class="btn btn-danger" role="button">
                             <li class="fa fa-trash"></li></a>
                        </td>
                    </tr>
                     @endforeach
                </tbody>
            </table>     
         </div>
         @else
             <div class="callout callout-warning">
                   <h4><i class="icon fa fa-warning"></i>
                    Importante!!
                   </h4>
                   <p>Al parecer no cuenta con ningun Suministro, por favor empiece agregando una.</p>
            </div> 
        @endif     
       </div>
   </div>
  	
@endsection

@section('script')
  <script type="text/javascript" >
  $(document).ready( function () {
        $('#suministros').DataTable
          ({
           "language": {
                     "url": "{{asset('../js/Spanish.json')}}"
                            }
          });           
       });
  </script>
@endsection