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

    {{-- <link href="{{ asset('Kenny/vendors/bower_components/summernote/summernote.min.css') }}"
    rel="stylesheet" type="text/css"> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    
    <!-- <link href="{{ asset('Kenny/vendors/bower_components/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/> -->
<!-- select2 CSS -->
<link href="{{ asset('Kenny/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
    @stack('links')
    <!-- Custom CSS -->
    <link href="{{ asset('Kenny/dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
