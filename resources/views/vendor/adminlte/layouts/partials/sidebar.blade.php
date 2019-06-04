<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <!--<img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />-->
                    <img src="{{asset('/img/user8-128x128.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!--{{ trans('adminlte_lang::message.header') }}-->
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}" style="text-decoration:none;"><i class='fa fa-home fa-2x'></i> <span>&nbsp &nbsp{{ trans('Inicio') }}</span></a></li>

            <li class="treeview">
                <a href="#" style="text-decoration:none;"><i class="fa fa-cube fa-2x"></i>
                    <span>
                    &nbsp &nbsp{{ trans('Productos') }}
                </span> 
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('productos')}}"><i class='fa fa-chevron-circle-right text-yellow'></i>{{ trans('Catalogo productos') }}</a></li>
                    <li><a href="{{url('categorias')}}"><i class='fa fa-chevron-circle-right text-yellow'></i>{{ trans('Categoría productos') }}</a></li>
                </ul>
            </li>

            <li class="">
                <a href="#"  style="text-decoration:none;"><i class='fa fa-group fa-2x '></i> <span>&nbsp &nbsp{{ trans('Provedores') }}</span> 
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('proveedores')}}"><i class='fa fa-chevron-circle-right text-yellow'></i>{{ trans('Catalogo Provedores') }}</a></li>
                    <li><a href="{{url('suministros')}}"><i class='fa fa-chevron-circle-right text-yellow'></i>{{ trans('Suministros') }}</a></li>
                </ul>
            </li>

            <li class="">
                <a href="#" style="text-decoration:none;"><i class='fa fa-shopping-cart fa-2x'></i> <span>&nbsp &nbsp{{ trans('Ventas') }}</span> 
                <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('ventas')}}"><i class='fa fa-chevron-circle-right  text-yellow'></i>{{ trans('ver') }}</a></li>
                    <li><a href="{{url('ventas/create')}}"><i class='fa fa-chevron-circle-right text-yellow'></i>{{ trans('Punto de Venta') }}</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
