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
                                    <form action="{{ route('admin.course.save') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$course['id']}}">
                                        <div class="form-body">
                                            <h3 class="txt-dark capitalize-font"><i class="icon-pencil mr-10"></i>Edit Course</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Type</label>
                                                        <input type="text" class="form-control" name="course_type"
                                                            placeholder="Course Type"
                                                            value="{{ $course['type'] }}">
                                                        @error('course_type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Title</label>
                                                        <input type="text" class="form-control" name="course_title"
                                                            placeholder="Course Title"
                                                            value="{{ $course['title'] }}">
                                                        @error('course_title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Description</label>
                                                        <textarea name="course_description" class="form-control summernote" rows="3"
                                                            placeholder="More about this course..">{{ $course['description'] }}</textarea>
                                                        @error('course_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Course Price</label>
                                                        <input type="text" class="form-control" name="course_price"
                                                            placeholder="Course Price"
                                                            value="{{ $course['price'] }}">
                                                        @error('course_price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Discount %</label>
                                                        <input type="number" class="form-control" min="0" max="100" name="course_discount"
                                                            placeholder="Discount %"
                                                            value="{{ $course['discount'] }}">
                                                        @error('course_discount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                                  
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Banner Image</label>
                                                        <input type="file" name="banner_image" class="form-control">
                                                        @error('banner_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option value="1"
                                                                {{ $course['status'] == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                            <option value="2"
                                                                {{ $course['status'] == 2 ? 'selected' : '' }}>Inactive
                                                            </option>
                                                        </select>
                                                        @error('status')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h3 class="txt-dark capitalize-font"><i class="icon-user mr-10"></i>Edit Author Details</h3>
                                            <hr>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Author Name</label>
                                                        <input type="text" class="form-control" name="creator_name"
                                                            placeholder="Creator Name"
                                                            value="{{ $course['creator'] }}">
                                                        @error('creator_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Author Image</label>
                                                        <input type="file" name="creator_image" class="form-control">
                                                        @error('creator_image')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                           
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Save</button>
                                            <a href="{{route("admin.course.list")}}" class="btn btn-default">Cancel</a>
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
            if($(this).prop('checked')) {
                $("#priority").attr('disabled', false);
            }
            else {
                $("#priority").attr('disabled', true);
            }
        });
    </script>
@endpush


