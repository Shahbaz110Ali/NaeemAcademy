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

<!-- Summernote JavaScript -->
{{-- <script src="{{asset('Kenny/vendors/bower_components/summernote/summernote.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
			
<!-- Summernote Init JavaScript -->
<script src="{{asset('Kenny/dist/js/summernote-data.js')}}"></script>
    <!-- Multiselect JavaScript -->
    <!-- <script src="{{ asset('Kenny/vendors/bower_components/multiselect/js/jquery.multi-select.js') }}"></script> -->

				<!-- Select2 JavaScript -->
                <script src="{{ asset('Kenny/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<!-- Slimscroll JavaScript -->
<script src="{{ asset('Kenny/dist/js/jquery.slimscroll.js') }}"></script>
<!-- Fancy Dropdown JS -->
<script src="{{ asset('Kenny/dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Sweet-Alert  -->
<script src=" {{asset('Kenny/vendors/bower_components/sweetalert/dist/sweetalert.min.js')}}"></script>
		
<script src=" {{asset('Kenny/dist/js/sweetalert-data.js')}}"></script>

@stack('scripts')
<!-- Init JavaScript -->
<script src="{{ asset('Kenny/dist/js/init.js') }}"></script>

@yield('customScript')

<script type="text/javascript">
    @if (session('toast'))
        toast_notification("{{ ucFirst(session('toast')) }}", "{{ session('msg') }}",
        "{{ session('toast') }}")
    @endif
</script>

