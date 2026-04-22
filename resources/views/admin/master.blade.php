<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cafe Amian">
    <meta name="author" content="">
    <title>Admin - Bán hàng</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('source/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="{{ asset('source/admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('source/admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('source/admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="{{ asset('source/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('source/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="wrapper">
        @include('admin.header')
        @yield('content')
    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="{{ asset('source/admin/bower_components/jquery/dist/jquery.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('source/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('source/admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('source/admin/dist/js/sb-admin-2.js') }}"></script>
    @yield('script')
</body>
</html>
