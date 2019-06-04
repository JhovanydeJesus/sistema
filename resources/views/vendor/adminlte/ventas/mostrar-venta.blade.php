@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Ventas') }}
@endsection

@section('contentheader_title')
   <a href="{{url('ventas/create')}}" title=""><button type="button" class="btn bg-olive">
    	 <li class="glyphicon glyphicon-plus"></li>
		   Punto de venta
	</button></a>
	
@endsection


@section('main-content')


   <div class="panel panel-primary">
       <div class="panel-heading">
          <h4 class="panel-title">Ventas</h4>
       </div>
       <div class="panel-body">
            <div class="table-responsive">
            <table  class="table table-hover">
                <thead>
                    <tr>
                       
                    </tr>
                </thead>
                <tbody>
                 
                    <tr>
                       
                    </tr>
                    
                </tbody>
            </table>     
         </div>
             <div class="callout callout-warning">
                   <h4><i class="icon fa fa-warning"></i>
                    Importante!!
                   </h4>
                   <p>Al parecer no cuenta con ninguna Venta, por favor empiece realizando una.</p>
            </div>      
       </div>
   </div>
  	
@endsection