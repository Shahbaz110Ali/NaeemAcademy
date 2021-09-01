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
                                    <form action="{{ route('admin.interface.store') }}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h3 class="txt-dark capitalize-font"><i class="icon-pencil mr-10"></i>Interface Details</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Title</label>
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="Title"
                                                            value="{{ old('title') }}">
                                                        @error('title')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <textarea name="description" class="form-control" rows="3"
                                                            placeholder="More about this interface..">{{ old('description') }}</textarea>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Include Departments</label>
                                                        <select class="form-control" name="include_department">
                                                            <option value="1" {{ ((old('include_department') == 1)?"selected":"" ) }}>Yes</option>
                                                            <option value="0" {{ ((old('include_department') === '0')?"selected":"" ) }}>No</option>
                                                        </select>
                                                        @error('status_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" name="status_id">
                                                            <option value="1" {{ ((old('status_id') == 1)?"selected":"" ) }}>Active</option>
                                                            <option value="2" {{ ((old('status_id') == 2)?"selected":"" ) }}>Inactive</option>
                                                        </select>
                                                        @error('status_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row --> --}}
                                            {{-- <div class="seprator-block"></div>
                                            <h6 class="txt-dark capitalize-font"><i class="icon-home mr-10"></i>Home Page Settings</h6>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="home_page" name="home_page_active" type="checkbox" value="1" {{ (old('home_page_active') == "1")?"checked":"" }}>
                                                        <label for="home_page" class="control-label"> Home Page Active </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Priority</label>
                                                        <select class="form-control" name="priority" id="priority" disabled>
                                                            <option value="1" {{ ((old('priority') == 1)?"selected":"" ) }}>1</option>
                                                            <option value="2" {{ ((old('priority') == 2)?"selected":"" ) }}>2</option>
                                                            <option value="3" {{ ((old('priority') == 3)?"selected":"" ) }}>3</option>
                                                        </select>
                                                        @error('priority')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="form-actions mt-10">
                                            <button type="submit" class="btn btn-success  mr-10"> Save</button>
                                            <a href="{{route("admin.interface")}}" class="btn btn-default">Cancel</a>
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


