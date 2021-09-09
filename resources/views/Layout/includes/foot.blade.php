<!-- jQuery -->
<script src="{{ asset('Kenny/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('Kenny/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Data table JavaScript -->
<script src="{{ asset('Kenny/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Kenny/dist/js/dataTables-data.js') }}"></script>
<!-- Toast JS -->
<script src="{{ asset('Kenny/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
<script src="{{ asset('Kenny/dist/js/toast-data.js') }}"></script>

<!-- Tinymce JavaScript -->
<script src="{{asset('Kenny/vendors/bower_components/tinymce/tinymce.min.js')}}"></script>
			
<!-- Tinymce Wysuhtml5 Init JavaScript -->
<script src="{{asset('Kenny/dist/js/tinymce-data.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('Kenny/dist/js/jquery.slimscroll.js') }}"></script>
<!-- Fancy Dropdown JS -->
<script src="{{ asset('Kenny/dist/js/dropdown-bootstrap-extended.js') }}"></script>

@stack('scripts')
<!-- Init JavaScript -->
<script src="{{ asset('Kenny/dist/js/init.js') }}"></script>

<script type="text/javascript">
    @if (session('toast'))
        toast_notification("{{ ucFirst(session('toast')) }}", "{{ session('msg') }}",
        "{{ session('toast') }}")
    @endif
</script>
