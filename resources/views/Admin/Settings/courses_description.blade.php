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
                                    <form action="{{ route('settings.courses.description.store') }}" method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <h3 class="txt-dark capitalize-font"><i class="icon-pencil mr-10"></i>Courses > Description</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">           
                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <textarea name="courses_description" class="form-control" rows="3"
                                                            placeholder="More about this Course tab.."  >{{ !empty($data) ? $data[0]['value'] : "" }}</textarea>

                                                        @error('courses_description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> 
                                                    
                                            </div>
    
                                            <div class="form-actions mt-10">
                                                <button type="submit" class="btn btn-success  mr-10">Save</button>
                                                
                                                <a href="{{route("admin")}}" class="btn btn-default">Cancel</a>
                                            </div>
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




