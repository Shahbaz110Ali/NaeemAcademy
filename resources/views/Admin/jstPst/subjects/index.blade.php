@extends("Layout.Admin.master")

@section('title', 'JST / PST')

@section('breadcrumb-links')
<li>
    <a href="{{ route('admin.jst-pst.subjects') }}">{{ "Subjects" }}</a>
</li>
@endsection

@section('content')

    <div class="row">

        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <form action="{{ route('admin.jst-pst.subjects.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-15">
                        <select name="subject_id" class="form-control">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span
                                    class="btn-text">Save</span></button>
                        </span>
                    </div>
                    @error('subject_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </form>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Subjects</h6>
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
                                            <th>Subject</th>
                                            <th class="text-nowrap text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($RegisteredSubject as $value)
                                            <tr>
                                                <td><a href="{{ route('admin.jst-pst.topics', $value['id']) }}">{{ $value['subject']['name'] }}</a></td>
                                                <td class="text-nowrap text-right">
                                                    <a href="javascript:void(0)" data-id="{{ $value['id'] }}"
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
                window.location.href = "{{ url('admin/jst-pst/subjects/destroy') }}/" + id;
            });
        })
    </script>
@endpush
