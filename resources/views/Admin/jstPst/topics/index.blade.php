@extends("Layout.Admin.master")

@section('title', 'JST / PST')

@section('breadcrumb-links')
    <li>
        <a href="{{ route('admin.jst-pst.subjects') }}">{{ 'Subjects' }}</a>
    </li>
    <li>
        <a href="#">{{ $RegisteredSubject['subject']['name'] }}</a>
    </li>
    <li>
        <a href="#">{{ 'Topics' }}</a>
    </li>
@endsection

@section('content')
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <form action="{{ route('admin.jst-pst.topics.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="registered_subject_id" value="{{ $RegisteredSubject['id'] }}">
                    <div class="input-group mb-15">
                        <input type="text" name="title" class="form-control" placeholder="Topic title">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span
                                    class="btn-text">Save</span></button>
                        </span>
                    </div>
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </form>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Topics</h6>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Topic</th>
                                            <th class="text-nowrap text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($topics as $topic)
                                            <tr>
                                                <td>
                                                    {{ $topic['title'] }}</td>
                                                <td class="text-nowrap text-right">
                                                    <a href="javascript:void(0)" alt="default" data-toggle="modal"
                                                        class="edit" data-toggle="tooltip" data-original-title="Delete"
                                                        data-title="{{ $topic['title'] }}" data-id="{{ $topic['id'] }}">
                                                        <i class="fa fa-edit"></i> </a>
                                                    <a href="javascript:void(0)" data-id="{{ $topic['id'] }}"
                                                        data-toggle="tooltip" data-original-title="Delete" class="delete">
                                                        <i class="fa fa-trash text-danger"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->
    </div>

    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="editModal">Edit</h5>
                </div>
                <form id="editFormm" action="{{ route('admin.jst-pst.topics.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="topic_id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label mb-10 text-left">Title</label>
                            <input type="text" class="form-control" name="title" value="" placeholder="Topic Title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@push('links')
    <!--alerts CSS -->
    <link href="{{ asset('kenny/vendors/bower_components/sweetalert/dist/sweetalert.css') }}" rel="stylesheet"
        type="text/css">
@endpush
@push('scripts')
    <!-- Sweet-Alert  -->
    <script src="{{ asset('kenny/vendors/bower_components/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        $(".delete").click(function() {
            let id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#fcb03b",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                window.location.href = "{{ url('admin/jst-pst/topics/destroy') }}/" + id;
            });
        });

        $(".edit").click(function() {
            let id = $(this).data('id');
            let title = $(this).data('title');
            $("#edit-modal [name='topic_id']").val(id);
            $("#edit-modal [name='title']").val(title);
            $("#edit-modal").modal('show');
        });

        $("#editForm").submit(function(e) {
            e.preventDefault();
            let form = $(this);
            formData = form.serialize();
            $.ajax({
                url: "{{ route('admin.jst-pst.topics.update') }}",
                type: "POST",
                data: formData,
                processData: false
            }).done(function(response, textStatus, xmlHttpRequest) {
                console.log(response);
            }).fail(function(xmlHttpRequest, textStatus, error) {
                swal({
                    title: "Error!",
                    text: error,
                    type: "error",
                })
            })
        });
        
    </script>
@endpush
