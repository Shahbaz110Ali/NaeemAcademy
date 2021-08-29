@extends("Layout.Admin.master")

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-wrap">
                                    <form action="{{ route('admin.jst-pst.subjects.store') }}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i class="icon-pencil mr-10"></i>Test
                                                Details</h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="subject" class="control-label">Subject</label>
                                                        <select name="subject_id" id="subject" class="form-control">
                                                            @foreach ($subjects as $subject)
                                                                <option value="{{ $subject['id'] }}">
                                                                    {{ $subject['subject']['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('subject_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="is_mixed" class="control-label">Type</label>
                                                        <select name="is_mixed" id="is_mixed" class="form-control">
                                                            <option value="1" {{ old('is_mixed') == 1 ? 'selected' : '' }}>
                                                                Mixed</option>
                                                            <option value="0" {{ old('is_mixed') === 0 ? 'selected' : '' }}>
                                                                Topic</option>
                                                        </select>
                                                        @error('is_mixed')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                            <div class="row d-none" id="topic-div">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="topic_id" class="control-label">Topic</label>
                                                        <select class="form-control" name="topic_id" id="topic_id"></select>
                                                        @error('topic_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="title" class="control-label">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control"
                                                            placeholder="Test Title" value="{{ old('title') }}">
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="questions" class="control-label">Question</label>
                                                        <input type="number" name="total_questions" id="questions"
                                                            class="form-control" placeholder="Number of questions"
                                                            name="{{ old('total_questions') }}">
                                                        @error('total_questions')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="options" class="control-label">Option</label>
                                                        <input type="number" name="total_options" id="options"
                                                            class="form-control" placeholder="Number of options"
                                                            {{ old('total_questions') }}>
                                                        @error('total_options')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="duration" class="control-label">Duration</label>
                                                        <input type="number" name="duration" id="duration"
                                                            class="form-control" placeholder="Test duration"
                                                            {{ old('duration') }}>
                                                        @error('duration')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" name="status_id">
                                                            <option value="1"
                                                                {{ old('status_id') == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                            <option value="2"
                                                                {{ old('status_id') == 2 ? 'selected' : '' }}>Inactive
                                                            </option>
                                                        </select>
                                                        @error('status_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                        </div>
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Save</button>
                                            <button type="button" class="btn btn-default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
@endsection


@push('scripts')
    <script>
        $("#home_page").change(function() {
            if ($(this).prop('checked')) {
                $("#priority").attr('disabled', false);
            } else {
                $("#priority").attr('disabled', true);
            }
        });

        $("#is_mixed").change(function() {
            $("#topic-div").toggleClass('d-none');
            load_topic()
        });

        function load_topic() {
            let subject_id = $("#subject").val();
            let is_mixed = $("#is_mixed").val();
            if (is_mixed == 0) {
                $.get("{{ url('admin/jst-pst/topics/get') }}/" + subject_id, function(data) {
                    try{
                        let json_response = JSON.parse(data);
                        if(json_response.topics) {
                            console.log(json_response);
                            $("#subject").empty();
                            $.each(json_response.topics, function(index, value) {
                                $("#subject").append("<option value="">"+value['']+"</option>")
                            });
                        }
                    } catch(e) {

                    }
                });
            }
        }
    </script>
@endpush
