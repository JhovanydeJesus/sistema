@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('Inicio') }}
@endsection

@section('contentheader_title')
		

@endsection

@section('main-content')
  

  <div class="box box-danger">
  	<div class="box-header width-border">
      <h4>Actividades realizadas</h4>
  	</div>
  	<div class="box-body">
  		<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$ventas}}</h3>

              <p>Nuevas ventas</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{url('ventas')}}" class="small-box-footer">
              Más información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$productos}}<sup style="font-size: 20px"></sup></h3>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="{{url('productos')}}" class="small-box-footer">
              Más información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$suministros}}</h3>

              <p>Suministros</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="{{url('suministros')}}" class="small-box-footer">
            Más información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$proveedores}}</h3>

              <p>Proveedores</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{url('proveedores')}}" class="small-box-footer">
             Más información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$proveedores}}</h3>

              <p>Proveedores</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">
             Más información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

          <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$suministros}}</h3>

              <p>Suministros</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="#" class="small-box-footer">
            Más información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
	
  </div>
 </div>



 
	
  	
  


@endsection