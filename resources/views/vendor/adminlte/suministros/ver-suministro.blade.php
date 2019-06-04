@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Ver_Suministro') }}
@endsection

@section('contentheader_title')
    <a href="{{url('suministros')}}" class="btn btn-danger">
        <i class='fa fa-arrow-circle-left'></i>
             Regresar 
    </a>
@endsection


@section('main-content')
  <section class="invoice">
      <!-- title row -->
   
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> AdminLTE, Inc.
            @foreach($suministro as $sumi)
             <small class="pull-right"><strong>Fecha: </strong>{{$sumi->fecha}}</small>
            @endforeach
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->

      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Proveedor
          <address>
            <strong>{{$sumi->nombre}}</strong><br>
            Dirección: {{$sumi->direccion}}<br>
            Ciudad: {{$sumi->ciudad}}<br>
            Codigo Postal: {{$sumi->cod_post}}<br>
            Telefono: {{$sumi->telefono}}
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          <b>Folio #{{$sumi->id}}</b><br>
        </div>
       
      </div>
      <!-- /.row -->
  
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Clave_Producto</th>
              <th>Producto</th>
              <th>Cantidad</th> 
              <th>Precio de compra</th>
              <th>Porecentaje de Venta</th>
              <th>Monto</th>
            </tr>
            </thead>
            <tbody>
               @foreach($DetalleSum as $ds)
            <tr>
              
              <th>{{$ds->clave}}</th>
              <td>{{$ds->descripcion}}</td>
              <td>{{$ds->cantidad}}</td>
              <td>${{$ds->p_compra}}</td>
              <td>{{$ds->porcentaje_venta}}%</td>
              <td>${{$ds->monto}}</td>
             
            </tr>
             @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
         

        </div>
        <!-- /.col -->
        <div class="col-xs-6">
    <h4> <p>Cantidad gastado</p></h4>
     
          <div class="table-responsive">
            <table class="table">
              <tbody>
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>${{$sumi->total}}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>${{$sumi->total}}</td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
     
    </section>

 
@endsection