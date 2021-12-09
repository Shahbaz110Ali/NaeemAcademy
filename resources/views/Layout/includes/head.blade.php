<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Naeem Academy {{(trim($__env->yieldContent('title')))?'|':''}} @yield('title')</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon"> --}}

    <!-- Data table CSS -->
    <link href="{{ asset('Kenny/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- Toast CSS -->
    <link href="{{ asset('Kenny/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}"
        rel="stylesheet" type="text/css" />

    <link href="{{ asset('Kenny/vendors/bower_components/sweetalert/dist/sweetalert.css') }}"
    rel="stylesheet" type="text/css">

    <link href="{{ asset('Kenny/vendors/bower_components/summernote/dist/summernote.css') }}"
    rel="stylesheet" type="text/css">
    
    @stack('links')
    <!-- Custom CSS -->
    <link href="{{ asset('Kenny/dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
