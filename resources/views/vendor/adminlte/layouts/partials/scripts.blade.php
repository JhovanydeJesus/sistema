<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{asset('../plugins/JQuery/jquery-2.2.3.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script src="{{asset('../plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('../plugins/datatables/jquery.dataTables.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('../plugins/datatables/dataTables.bootstrap.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('../plugins/select2/select2.full.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('../plugins/select2/select2.js')}}" type="text/javascript"></script>
<script src="{{asset('../jquery-confirm/js/jquery-confirm.min.js')}}" type="text/javascript"></script>

@yield('script')


<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
